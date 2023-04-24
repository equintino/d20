<?php

namespace Core;

class Session
{
    private $user;
    public readonly string $login;
    public readonly string $password;
    public readonly string $db;

    public function __construct(public readonly ?string $ses = "ses", public readonly ?string $sID = null)
    {
        $connectionDirectory = __DIR__ . "/../" . $ses;
        if (!file_exists($connectionDirectory)) {
            mkdir($connectionDirectory);
        }
        if (!session_id()) {
            session_save_path($connectionDirectory);
            session_name("SVSESSID");
            session_start();
        }

        if (!empty($_SESSION["id"])) {
            $_SESSION["id"] = session_id();
            $this->sID(session_id());
        }
        $this->user = ($_SESSION["login"] ?? null);
    }

    public function confSID($current, $old)
    {
        return  crypt($current, $this->SID) == $this->SID;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setDb(string $db): void
    {
        $this->db = $db;
    }

    public function setUser(\Models\User $user): void
    {
        $login = new \stdClass();
        $login->id = $user->id;
        $login->name = $user->name;
        $login->email = $user->email;
        $login->login = $user->login;
        $login->group_id = $user->group_id;
        $login->token = $user->token;
        $login->db = $this->db;

        $_SESSION['login'] = $login;
        $this->user = $login;
    }

    public function destroy()
    {
        session_destroy();
    }
}
