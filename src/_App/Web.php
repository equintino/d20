<?php

namespace _App;

use Traits\AuthTrait;

class Web extends Controller
{
    use AuthTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function start()
    {
        $route = filter_input(INPUT_GET, "route", FILTER_UNSAFE_RAW);

        $logged = (new Login())->start($route);

        if ($logged) {
            return $this->setPath('public')->render('index');
        }

        if ($route === '/register') {
            return (new Register())->add([]);
        }
    }

    public function init()
    {
        $params['group'] = $this->group;
        $this->view->insertTheme($params);
    }

    public function home(): void
    {
        $this->render("home");
    }

    public function error($data): void
    {
        $errcode = $data["errcode"];
        $this->render("error", [ compact("errcode") ]);
    }

    public function version(): string
    {
        $file = __DIR__ . "/../../version";
        if (file_exists($file)) {
            foreach (file($file) as $row) {
                if (!preg_match("/^#/", $row)) {
                    return $row;
                }
            }
        }
    }
}
