<?php

namespace _App;

class Login extends Controller {
    public function init(): void
    {
        $this->view->render('login');
    }

    public function enter(array $data)
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        $login = (new \Core\Login($login, $password, $db))->user();
        $login->validate();

        return print($login->message ?? null);
    }
}
