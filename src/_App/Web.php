<?php

namespace _App;

// use Core\Login;
use Config\Config;
use Traits\AuthTrait;

class Web extends Controller
{
    use AuthTrait;
    public readonly array $servePage;

    public function __construct()
    {
        parent::__construct();
        $this->servePage = [
            'register',
            'user',
            'group',
            'token',
            'login',
            'confdb'
        ];
    }

    public function start()
    {
        $route = filter_input(INPUT_GET, "route", FILTER_UNSAFE_RAW);
        // $version = $this->version();
        // $version = '';
        // $connectionList = '';
        $config = new Config(".config.ini");
        // $connectionList = array_keys($config->dataFile);
        $login = filter_input(INPUT_COOKIE, "login", FILTER_UNSAFE_RAW);
        $connectionName= filter_input(INPUT_COOKIE, "connectionName", FILTER_UNSAFE_RAW);
        $checked = filter_input(INPUT_COOKIE, "remember", FILTER_UNSAFE_RAW);

        // if (empty($connectionList)) {
        //     $initializing = true;
        //     // echo "<script>var initializing = {$initializing}</script>";
        // }

        // if (!empty($route) && in_array(str_replace('/', '', $route), $this->servePage)) {
        //     $this->view->setPath("Server")->render(str_replace("/", '', $route));
        // }
        if (empty($_SESION['login']) && $route !== '/login' && $route !== '/register' && $route !== '/enter') {
            return $this->view->setPath('public')->render('index');
        }

        if ($route === '/login') {
            return $this->view->render('login');
        }

        if ($route === '/enter') {
            return (new Login())->enter($_POST);
        }

        if ((!empty($route) && (!empty($_SESSION["login"]) || empty($connectionList))) || $route === "token") {
            $types = $config->types;
            $act = "add";
            $groups = (new \Models\Group())->activeAll();
            $this->view->setPath("Modals")->render($route, [ compact("login", "types", "act", "groups") ]);
        } else {
            $this->view->setPath("public")->render(
                "index", compact(
                    // "version", "connectionList", "login", "connectionName", "checked"
                    "login", "connectionName", "checked"
                )
            );
        }
    }

    public function init()
    {
        // $logged = (!empty($_SESSION['login']->login) && is_object($_SESSION["login"]) ?
        //     ucfirst($_SESSION["login"]->login) : ucfirst($_SESSION["login"]));
        // echo "<script>var logged='{$logged}'</script>";
        $this->view->insertTheme();
    }

    public function home(): void
    {
        $page = "home";
        $this->view->render("home", [ compact("page") ]);
    }

    public function error($data): void
    {
        $errcode = $data["errcode"];
        $this->view->render("error", [ compact("errcode") ]);
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
