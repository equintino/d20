<?php

namespace _App;

use Traits\AuthTrait;
use Views\View;
// use Core\Safety;

class Web extends Controller
{
    use AuthTrait;

    public function __construct()
    {
        parent::__construct();
        $this->view = new View(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
        $this->path  = __DIR__ . "/../pages";
    }

    public function start()
    {
        $route = filter_input(INPUT_GET, "route", FILTER_UNSAFE_RAW);
        $groups = (new Group())->getGroup();

        if ($this->login($route, $groups) && empty($_SESSION['login'])) {
            $this->setPath('public')->render('index');
        }
    }

    public function init()
    {
        // $params['group'] = $this->group;
        // $params['group'] = (new Group())->getGroup();
        $id = $_SESSION['login']->group_id;
        $params['group'] = (new Group())->getThisGroup($id);
        $head = $this->seo(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            url() . "//" . theme("assets/img/loading.png"),
            url() . "//" . theme("assets/img/logo-menu.png")
        );
        $this->view->insertTheme($params, null, $head);
        // $this->render('home');
    }

    public function setPath(string $path): Web
    {
        $this->path = __DIR__ . "/../{$path}";
        return $this;
    }

    public function render(string $page, array $params = [])
    {
        // if (!strpos($this->path, "Server") && !strpos($this->path, "Modals") && empty($this->access)
        //     && !Safety::restrictAccess($page)) {
        //     return print "<h5 align='center' style='color: var(--cor-primary)'>Restricted access</h5>";
        // }
        $this->view->render($this->path . "/{$page}", $params);
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
