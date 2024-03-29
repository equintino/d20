<?php

namespace Models;

use Core\Model;
use Database\Migrations\CreateUsersTable;
use Models\Group;

class User extends Model implements Models
{
    /** @var Models\Group */
    private $group;

    /** @var string $entity database table */
    public static $entity = "users";

    /** @var array filds required */
    private $required = [ "login", "password", "user", "name", "email" ];

    private $fields = ['name','email','login','user','password','group_id','token', 'active'];

    public function getEntity()
    {
        return self::$entity;
    }

    public function setPasswd(string $passwd)
    {
        $this->password = $this->crypt($passwd);
    }

    public function getPasswd(): string
    {
        return $this->password;
    }

    public function load(int $id, string $columns = "*", bool $msgDb = false): ?User
    {
        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE id=:id", "id={$id}", $msgDb);

        if ($this->fail || !$load->rowCount()) {
            $this->message = "<span class='warning'>Unscribed ID User</span>";
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    /** @var $busca array|string */
    public function find($search, string $columns = "*", bool $msgDb = false): array | User
    {
        $login = &$search;
        if (is_array($search)) {
            foreach ($search as $columnName => $value) {
                $params[] = "{$columnName}=:{$columnName}";
                $terms[] = "{$columnName}={$value}";
            }
            $params = implode(" AND ", $params);
            $terms = implode("&", $terms);
            $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE {$params} ", $terms, $msgDb);
        } elseif (filter_var($search, FILTER_VALIDATE_EMAIL)) {
            $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE email=:email",
                "email={$search}", $msgDb);
        } elseif (filter_var($login, FILTER_UNSAFE_RAW)) {
            $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE login=:login",
                "login={$login}", $msgDb);
        } else {
            $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE name=:name",
                "name={$login}", $msgDb);
        }

        if ($this->fail || $find->rowCount() === 0) {
            $this->message = (
                empty($this->fail()) ?
                "<span class='warning'>Unscribed email or user informed</span>"
                : $this->fail()->errorInfo[2]
            );
            return $this;
        }

        return is_array($search) ? $find->fetchAll(\PDO::FETCH_CLASS, __CLASS__) : $find->fetchObject(__CLASS__);
    }

    public function all(
        int $limit=30, int $offset=0, string $columns = "*", string $order = "id", bool $msgDb = false
    ): ?array
    {
        $all = $this->read("SELECT {$columns} FROM  "
            . self::$entity . " "
            . $this->order($order)
            . $this->limit(), "limit={$limit}&offset={$offset}", $msgDb);

        if ($this->fail || !$all->rowCount()) {
            $this->message = "<span class='warning'>Your query has not returned data</span>";
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    public function save(bool $msgDb = false): ?User
    {
        if (!$this->required()) {
            return null;
        }

        /** Update */
        if (!empty($this->id)) {
            $this->update_($msgDb);
        }

        /** Create */
        if (empty($this->id)) {
            $this->create_($msgDb);
        }
        $this->data = $this->read("SELECT * FROM " . self::$entity . " WHERE id=:id", "id={$this->id}")->fetch();

        return $this;
    }

    private function update_(bool $msgDb)
    {
        $email = $this->read("SELECT id FROM " . self::$entity . " WHERE email = :email AND id != :id",
            "email={$this->email}&id={$this->id}");
        if ($email->rowCount()) {
            $this->message = "<span class='warning'>The informed e-mail is already registered</span>";
            return null;
        }

        $this->update(self::$entity, $this->safe(), "id = :id", "id={$this->id}");
        if ($this->fail()) {
            $this->message = (
                !$msgDb ? "<span class='danger'>Error updating, verify the data</span>" : $this->fail()->errorInfo[2]
            );
            return null;
        }
        $this->message = "<span class='success'>Data updated successfully</span>";
    }

    private function create_(bool $msgDb)
    {
        $user = new User();
        if ($user->find($this->email, "*", $msgDb)->email) {
            $this->message = "<span class='warning'>The informed e-mail is already registered</span>";
            return null;
        } elseif ($user->find($this->login, "*", $msgDb)->login) {
            $this->message = "<span class='warning'>The informed login is already registered</span>";
            return null;
        }

        $this->id = $this->create(self::$entity, $this->safe());
        if ($this->fail()) {
            $this->message = (
                !$msgDb ? "<span class='warning'>Error to Register, Check the data</span>" : $this->fail()->errorInfo[2]
            );
            return null;
        }
        $this->message = "<span class='success'>Registration successfully</span>";
    }

    public function destroy(): ?User
    {
        if (!empty($this->id)) {
            $this->delete(self::$entity, "id=:id", "id={$this->id}");
        }

        if ($this->fail()) {
            $this->message = "<span class='danger'>Could not remove the user</span>";
            return null;
        }
        $this->message = "<span class='success'>User has been successfully removed</span>";
        $this->data = null;

        return $this;
    }

    public function required(): bool
    {
        foreach ($this->required as $field) {
            if (empty($this->$field)) {
                $this->message = "<span class='warning'>The field {$field} is required</span>";
                return false;
            }
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->message = "<span class='warning'>The e-mail format does not appear valid</span>";
            return false;
        }

        return true;
    }

    public function createThisTable()
    {
        $sql = (new CreateUsersTable())->up(self::$entity);
        return $this->createTable($sql);
    }

    public function dropThisTable()
    {
        $sql = (new CreateUsersTable())->down(self::$entity);
        return $this->dropTable($sql);
    }

    public function getGroup(): ?Group
    {
        if (!empty($this->group_id)) {
            return $this->group = (new Group())->load($this->group_id);
        }
        return $this->group = null;
    }

    public function token(string $login = null)
    {
        if (!empty($this->id)) {
            $this->token = crypt("Gera Token", "rl");
            $this->update(self::$entity, $this->safe(), "id = :id", "id={$this->id}");
        }
        if ($this->fail()) {
            $this->message = "<span class='danger'>Error to Reset Password, try again</span>";
            return null;
        }
        $this->message = "<span class='success'>New password <span class='uppercase'>{$login}</span>"
            . " will be registered in the next login</span>";
    }

    protected function safe(): ?array
    {
        $sf = (array) $this->data();
        foreach (static::$safe as $unset) {
            unset($sf[$unset]);
        }

        foreach ($sf as $k => $v) {
            if (!in_array($k, $this->fields)) {
                unset($sf[$k]);
            }
        }

        $exception=["token"];
        return filterNullException($sf, $exception);
    }

}
