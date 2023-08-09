<?php

namespace _App;

class Login extends Controller {
    private $initRoutes = [
        '/login',
        '/register',
        '/enter'
    ];

    public function start(?string $route)
    {
        if (empty($_SESSION['login']) && !in_array($route, $this->initRoutes)) {
            // return true;
            return false;
        }

        // if ($route === '/login') {
        //     $this->init();
        // }

        if ($route === '/enter') {
            $this->enter($_POST);
        }
    }

    public function init(): void
    {
        $this->view->render('login');
    }

    /** conferir o uso */
    public function enter(array $data): ?string
    {
        extract($data);
        $lg = (new \Core\Login($login, $password, $db))->user();
        $lg->validate();

        return print $lg->message ?? null;
    }
}
