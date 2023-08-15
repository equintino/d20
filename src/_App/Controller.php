<?php

namespace _App;

use Traits\ClassTraits;
use Views\View;
use Core\Session;
// use Core\Safety;
// use Models\Group;
use Database\CreationProcess;

abstract class Controller
{
    use ClassTraits;

    protected $path;
    // public $group;
    private $access;
    protected $view;
    protected $seo;
    protected $loading;

    public function __construct()
    {
        $this->view = new View();
        $this->path  = __DIR__ . "/../pages";
        // $this->view = new View(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
        // $this->validate();
        // $this->loading = theme("assets/img/loading.png");
    }

    protected function getPost($data)
    {
        foreach ($data as $key => $value) {
            $params[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $params;
    }

    protected function getGet($data)
    {
        foreach ($data as $key => $value) {
            $params[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $params;
    }

    protected function seo(
        string $title, string $desc, string $url, string $img, string $logo, bool $follow = false
    )
    {
        return compact("title", "desc", "url", "img", "logo", "follow");
    }

    protected function getUser()
    {
        return (new Session())->getUser();
    }

    protected function setPath(string $path): Controller
    {
        $this->path = __DIR__ . "/../{$path}";
        return $this;
    }

    protected function render(string $page, array $params = []): void
    {
        // if ((new Session())->getUser()) { $this->init(); }
        // if ($this->getUser()) { $this->init(); }

        // $params['user'] = $this->user;
        // $params['categories'] = $this->categories;
        // if (!strpos($this->path, "Server") && !strpos($this->path, "Modals") && empty($this->access)
        //     && !Safety::restrictAccess($page)) {
        //     return print "<h5 align='center' style='color: var(--cor-primary)'>Restricted access</h5>";
        // }
        // $this->view->render($this->path . "/{$page}", $params);
        $this->view->render($this->path . "/{$page}", $params);
    }

    // public function validate(): void
    // {
    //     $login = (new Session())->getUser();
    //     /** allows or prohibits access */
    //     if (!empty($login) && !empty($login->group_id)) {
    //         $group = new Group();
    //         $gAccess = $group->load($login->group_id, "*", true);
    //         if (!$gAccess && preg_match("/[doesn't exist][inválido]/", $group->message())) {
    //             $createTable = new CreationProcess();
    //             $data = [
    //                 "name" => "Administrador",
    //                 "access" => "*",
    //                 "active" => 1
    //             ];
    //             $createTable->createTable(new Group, $data);
    //             header("Refresh: 0");
    //         } else {
    //             $this->group = (new Group())->load($this->login()->group_id);
    //             $this->access = $this->group->access;
    //         }
    //     } else {
    //         if (!defined("CONF_CONNECTION")) {
    //             $this->group = (new Group())->activeAll();
    //         }
    //         if (!empty($login->group_id)) {
    //             $this->group = (new Group())->load($_SESSION['login']->getUser()->group_id);
    //         }
    //     }
    // }

    // public function setPath(string $path): Controller
    // {
    //     $this->path = __DIR__ . "/../{$path}";
    //     return $this;
    // }

    // public function render(string $page, array $params = [])
    // {
    //     if (!strpos($this->path, "Server") && !strpos($this->path, "Modals") && empty($this->access)
    //         && !Safety::restrictAccess($page)) {
    //         return print "<h5 align='center' style='color: var(--cor-primary)'>Restricted access</h5>";
    //     }
    //     $this->view->render($this->path . "/{$page}", $params);
    // }
}
