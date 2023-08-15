<?php

namespace _App;

class Login extends Controller {
    /** conferir o uso */
    public function enter(array $data): ?string
    {
        extract($data);
        $lg = (new \Core\Login())->user($login, $password, $db);
        $lg->validate();

        return print $lg->message ?? null;
    }
}
