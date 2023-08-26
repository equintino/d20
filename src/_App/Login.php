<?php

namespace _App;

class Login extends Controller {

    public function __construct()
    {
        parent::__construct(new \Core\Login());
    }

    public function enter(array $data): ?string
    {
        extract($data);
        $lg = $this->class->user($login, $password, $db);
        $lg->validate();

        return print $lg->message ?? null;
    }
}
