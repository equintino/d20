<?php

namespace Traits;

trait AuthTrait
{
    private function login(?string $route, array $groups): bool
    {
        switch ($route) {
            case '/login':
                $this->setPath('pages')->render('login');
                break;
            case '/register':
                $this->setPath('Modals')->render('register', [ compact('groups') ]);
                break;
            case '/enter':
                (new \_App\Login())->enter($_POST);
                break;
            default:
                return true;
        }
        return false;
    }

    public function token($login)
    {
        $this->view->setPath("Modals")->render("token", [ compact("login") ]);
    }

    public function save()
    {
        var_dump($_POST);
    }

    public function forget(): void
    {

    }

    public function register(): void
    {

    }
}
