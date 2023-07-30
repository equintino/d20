<?php

namespace _App;

class Login extends Controller {
    private $initRoutes = [
        '/login',
        '/register',
        '/enter'
    ];

    public function construct()
    {
        parent::__construct();
    }

    public function start(?string $route)
    {
        if (empty($_SESSION['login']) && !in_array($route, $this->initRoutes)) {
            return true;
        }

        if ($route === '/login') {
            $this->init();
        }

        if ($route === '/enter') {
            $this->enter($_POST);
        }
    }

    public function init(): void
    {
        $this->render('login');
    }

    /** conferir o uso */
    public function enter(array $data): void
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        $lg = (new \Core\Login($login, $password, $db))->user();
        $lg->validate();

        echo $lg->message ?? null;
    }
}
