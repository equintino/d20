<?php

namespace Core;

use Models\User;
use Support\FileTransation;

class Login
{
    public readonly Session $session;
    public readonly ?User $user;
    public readonly string $password;
    public string $message;
    private $db;

    public function __construct()
    {
        $this->session = new Session("ses");
    }

    public function user(string $login, string $password, string $db): Login | string
    {
        $this->user = (new User())->find($login);
        $this->db = $db;
        $this->session->setDb($db);
        $this->password = $password;
        $_SESSION['login'] = $this->session;

        if (!empty($this->user->message()) && preg_match("/doesn't exist/", $this->user->message())) {
            $this->user->createThisTable();
            $this->message = "No data";
        } elseif (!$this->user->login) {
            $this->message = "Non-existent";
        }
        return $this;
    }

    public function validate(): bool | string
    {
        if (!$this->user->login) {
            $this->session->destroy();
            $this->message = json_encode("No exist login");
        } elseif ($this->user->token) {
            $this->message = json_encode("reset password");
        } elseif ($this->user->validate($this->password, $this->user->password)) {
            $this->setSession($this->user->login);
            $this->message = json_encode(true);
        } else {
            $this->session->destroy();
            $this->message = json_encode("Invalid password");
        }
        return $this->message;
    }

    private function setSession($login): void
    {
        $this->session->setLogin($login);
        $this->session->setPassword($this->password);
        FileTransation::setLocal($this->db);
        $this->session->setUser($this->user);
        if (!empty($_SESSION["login"])) {
            $_SESSION["login"] = $this->session;
            $this->session->setUser($this->user);
        }
    }
}
