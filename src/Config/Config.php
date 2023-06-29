<?php

namespace Config;

use JsonException;
use Traits\CryptoTrait;

class Config
{
    use CryptoTrait;

    private $data;
    private $dsn;
    private $user;
    private $passwd;
    public static string $file;
    public static object $dataFile;
    public static string $local;
    public $message;
    public $types = [ "mysql", "sqlsrv" ];

    public function __construct()
    {
        self::$file = ".config.json";
        if (file_exists(__DIR__ . "/" . self::$file)) {
            self::$dataFile = json_decode(file_get_contents(__DIR__ . "/" . self::$file));
        }
        self::$local = self::getConfConnection();
    }

    public static function getConfig(): ?object
    {
        return self::$dataFile->{self::getConfConnection()} ?? null;
    }

    /** contant file env */
    public static function getConfConnection(): ?string
    {
        if (!empty($_SESSION["login"])) {
            return $_SESSION["login"]->db;
        }
        return CONF_CONNECTION;
    }

    public function setConfConnection(array $data, string $connectionName = null)
    {
        self::$local = (!empty($connectionName) ? $connectionName : $data["connectionName"]);
        $this->data = $data;
        $this->setType($this->data["type"]);
        $this->setAddress($this->data["address"]);
        $this->setDatabase($this->data["db"]);
        $this->setUser($this->data["user"]);
        if (!empty($this->data["passwd"])) {
            $this->setPasswd($this->data["passwd"]);
        }
    }

    public function type(): ?string
    {
        return !empty(self::$dataFile->{self::$local}) ?
                    strstr(self::$dataFile->{self::$local}->dsn, ":", true) : null;
    }

    private function setType(string $type)
    {
        $dsn = "";
        switch ($type) {
            case "sqlsrv":
                $dsn .= "sqlsrv:Server=";
                break;
            case "mysql":
                $dsn .= "mysql:host=";
                break;
            default:
        }
        $this->dsn = $dsn;
    }

    public function address(): ?string
    {
        return substr(strstr(strstr(self::$dataFile->{self::$local}->dsn, "="), ";", true),1);
        // return substr(strstr(strstr(self::$file[self::$local]["dsn"], "="), ";", true),1);
    }

    private function setAddress(string $address)
    {
        $this->dsn .= "{$address};";
    }

    public function database(): ?string
    {
        return substr(strrchr(self::$dataFile->{self::$local}->dsn, "="), 1);
        // return substr(strrchr(self::$file[self::$local]["dsn"], "="), 1);
    }

    private function setDatabase(string $database)
    {
        if ($this->data["type"] === "sqlsrv") {
            $name = "Database";
        } elseif ($this->data["type"] === "mysql") {
            $name = "dbname";
        }
        $this->dsn .= "{$name}={$database}";
    }

    public function getDsn(): ?string
    {
        return $this->dsn;
    }

    public function user(): ?string
    {
        return self::$dataFile->{self::$local}->user;
        // return self::$file[self::$local]["user"];
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    private function setUser(string $user)
    {
        $this->user = $user;
    }

    public function passwd(): ?string
    {
        return $this->decrypt(self::$file[self::$local]["passwd"]);
    }

    public function getPasswd(): ?string
    {
        return $this->passwd;
    }

    private function setPasswd(string $passwd)
    {
        $this->passwd = (!empty($passwd) ? base64_encode($passwd) : null);
    }

    private function decrypt(?string $passwd): ?string
    {
        return base64_decode($passwd);
    }

    public function confirmSave(): bool
    {
        if (array_key_exists(self::$local, self::$file)) {
            $this->message = "<span class=warning >The connection name already exists</span>";
            return false;
        } else {
            return $this->save();
        }
    }

    public function save(array $data): bool
    {
        $connectionName = $data["connectionName"];
        $file = (self::$dataFile ?? new \StdClass());
        $this->setConfConnection($data);

        $file->$connectionName = [
            'dsn' => $this->getDsn(),
            'user' => $this->getUser(),
            'passwd' => $this->getPasswd()
        ];

        $saved = $this->saveFile($file);
        $this->message = ($saved ? "<span class='success'>Data saved successfully</span>"
            : "<span class='danger'>Erro ao salvar</span>");
        return $saved;
    }

    public function update(array $data): bool
    {
        $file = (object) $this->getFile();
        $this->setConfConnection($data["data"]);
        parse_str($data["data"], $data);
        $connectionName = $data["connectionName"];

        $file->$connectionName = [
            "dsn" => $this->getDsn(),
            "user" => $this->getUser(),
            "passwd" => $file->$connectionName["passwd"]
        ];

        $saved = $this->saveFile((array) $file);

        $this->message = (
            $saved ? "<span class='success'>Data saved successfully</span>"
                : "<span class='error'>Erro ao salvar</span>"
        );
        return $saved;
    }

    public function delete(string $connectionName): ?bool
    {
        unset(self::$dataFile->$connectionName);
        if ($this->saveFile(self::$dataFile)) {
            $this->message = "<span class='success'>Excluded data successfully</span>";
            return true;
        } else {
            $this->message = "<span class='warnig'>Could not delete data</span>";
            return false;
        }
    }

    private function saveFile(object $data): bool
    {
        $file = __DIR__ . "/../Config/.config.json";
        /** saving file */
        if (file_exists($file)) {
            $handle = fopen($file, "r+");
        } else {
            $handle = fopen($file, "w");
        }
        ftruncate($handle, 0);
        rewind($handle);
        $resp = fwrite($handle, json_encode($data, JSON_FORCE_OBJECT));
        fclose($handle);
        return $resp;
    }

    public function message(): ?string
    {
        return $this->message;
    }
}
