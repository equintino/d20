<?php

namespace _App;

// use Traits\AuthTrait;
// use Views\View;
// use Core\Session;
// use Core\Safety;

class Web extends Controller
{
    // public $web;
    // use AuthTrait;
    // private $user;
    // private $categories;

    // public function __construct()
    // {
    //     $this->web = new \Views\Web();
    //     // parent::__construct();
    //     // $this->view = new \Views\View(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    //     // $this->path  = __DIR__ . "/../pages";
    //     // $this->user = (new \Core\Session())->getUser();
    //     // $this->categories = (new \Models\Category())->activeAll();
    // }

    /** no login */
    public function start(): void
    {
        // $route = filter_input(INPUT_GET, "route", FILTER_UNSAFE_RAW);
        // $groups = $this->group()->activeAll();

        // if ($this->login($route, $groups)) {
             $this->setPath('public')->render('index');
        // }
    }

    public function _login(): void
    {
        $this->setPath('pages')->render('login');
    }

    public function register(): void
    {
        $groups = $this->group()->activeAll();
        $this->setPath('Modals')->render('register', compact('groups'));
    }

    public function enter(): string
    {
        return (new Login())->enter($_POST);
    }

    public function home(): void
    {
        $this->setPath('pages')->render("home");
    }

    public function error($data): void
    {
        $errcode = $data["errcode"];
        $this->render("error", compact("errcode"));
    }

    /** after login */
    private function init(): void
    {
        $id = $_SESSION['login']->group_id;
        $params['group'] = (new Group())->getThisGroup($id);
        $head = $this->seo(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            url() . "//" . theme("assets/img/loading.png"),
            url() . "//" . theme("assets/img/logo-menu.png")
        );
        $this->view->insertTheme($params, $head);
    }

    protected function render(string $page, array $params = []): void
    {
        // if ((new Session())->getUser()) { $this->init(); }
        if ($this->getUser()) { $this->init(); }

        // $params['user'] = $this->user;
        // $params['categories'] = $this->categories;
        // if (!strpos($this->path, "Server") && !strpos($this->path, "Modals") && empty($this->access)
        //     && !Safety::restrictAccess($page)) {
        //     return print "<h5 align='center' style='color: var(--cor-primary)'>Restricted access</h5>";
        // }
        // $this->view->render($this->path . "/{$page}", $params);
        $this->view->render($this->path . "/{$page}", $params);
    }

    // private function version(): string
    // {
    //     $file = __DIR__ . "/../../version";
    //     if (file_exists($file)) {
    //         foreach (file($file) as $row) {
    //             if (!preg_match("/^#/", $row)) {
    //                 return $row;
    //             }
    //         }
    //     }
    // }
}
