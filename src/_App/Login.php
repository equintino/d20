<?php

namespace _App;

class Login extends Controller {
    public function init(): void
    {
        $this->view->render('login');
    }

    /** conferir o uso */
    public function enter(array $data)
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        $lg = (new \Core\Login($login, $password, $db))->user();
        $lg->validate();

        return print $lg->message ?? null;
    }
}
