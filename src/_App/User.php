<?php

namespace _App;

class User extends Controller
{
    protected $page = " user";

    public function __construct()
    {
        parent::__construct(new \Models\User());
    }

    public function init(?array $data): void
    {
        $params = [];
        $company_id = ($data["company_id"] ?? null);
        $this->render("user", $params);
    }

    public function list(?array $data): void
    {
        $act = "list";
        $login = $_SESSION["login"]->login;
        if (!empty($data["company_id"])) {
            $users = $this->class->find(["company_id" => $data["company_id"]]);
        } else {
            $users = $this->class->all();
        }

        $user = $this->class->find($login);
        $groups = $this->group()->activeAll();

        $this->setPath("Modals")->render("user", compact("act", "login", "users", "user", "groups"));
    }

    public function add(): void
    {
        $act = "edit";
        $groups = $this->group()->activeAll();

        $this->setPath("Modals")->render("user", compact("act", "groups"));
    }

    public function edit(array $data): void
    {
        $act = "edit";
        $login = $data["login"];
        $user = $this->class->find(($login));
        $groups = $this->group()->all();

        $this->setPath("Modals")->render("user", compact("act", "user", "groups"));
    }

    public function save(array $data): string
    {
        $data["user"] = &$data["login"];
        if (empty($data['id'])) {
            $data = $this->confPassword($data);
            $user = $this->class;
        } else {
            $user = $this->class->load($data['id']);
        }

        $user->bootstrap($data);
        $user->save(true);
        return print json_encode($user->message());
    }

    public function update(array $data): void
    {
        $user = $this->class->find($data['login']);
        foreach ($data as $key => $value) {
            if ($key === 'password') {
                $user->setPasswd($value);
                $user->$key = $user->getPasswd();
            } else {
                $user->$key = $value;
            }
        }
        $user->save();
        echo json_encode($user->message());
    }

    public function reset(array $data): void
    {
        $user = $this->class->find($data["login"]);
        $user->token($data["login"]);
        echo json_encode($user->message());
    }

    public function token(array $data)
    {
        $login = $data['login'];
        $user = $this->class->find([ "login" => $data['login']])[0];
        $this->setPath('Modals')->render('token', compact('login', 'user'));
    }

    public function delete(array $data): ?string
    {
        $user = $this->class->find($data["login"]);
        $user->destroy();
        return print json_encode($user->message());
    }

    private function confPassword(array $params): ?array
    {
        $passwd = ($params["password"] ?? null);
        $confPasswd = ($params["confPassword"] ?? null);
        if ($passwd !== $confPasswd) {
            die("<span class='warning'>The password was not confirmed</span>");
        } else {
            unset($params["confPassword"]);
        }
        return $params;
    }
}
