<?php

namespace Core;

use Models\User;
use Support\FileTransation;

class Login
{
    public readonly Session $session;
    public readonly ?User $user;
    public string $message;
    private $db;

    public function __construct(readonly string $login, readonly string $password, string $db)
    {
        $this->session = new Session("ses");
        $this->db = $db;
        $this->session->setDb($db);
        $_SESSION['login'] = $this->session;
    }

    public function user(): Login | string
    {
        $this->user = (new User())->find($this->login);
        if (!$this->user && preg_match("/doesn't exist/", $this->user->message())) {
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
            return $this->message = "No exist login";
        }
        if ($this->user->token) {
            $this->message = "reset password";
        } elseif ($this->user->validate($this->password, $this->user->password)) {
            $this->setSession();
            $this->message = true;
        } else {
            $this->message = "Invalid password";
        }
        return $this->message;
    }

    public function setSession()
    {
        $this->session->setLogin($this->login);
        $this->session->setPassword($this->password);
        // $this->session->setDb($this->db);
        FileTransation::setLocal($this->db);
        $this->session->setUser($this->user);
        if (!empty($_SESSION["login"])) {
            $_SESSION["login"] = $this->session;
            $this->session->setUser($this->user);
        }
    }
}
