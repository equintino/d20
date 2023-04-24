<?php

namespace Core;

use Models\Group;
use Database\CreationProcess;

class View
{
    private $path;
    private $access = [];
    private $group;
    public $theme;

    public function __construct(string $theme = null)
    {
        $this->theme = $theme;
        $this->path  = __DIR__ . "/../pages";
        $this->login();
        $this->validate();
    }

    public function setPath(string $path): View
    {
        $this->path = __DIR__ . "/../{$path}";
        return $this;
    }

    public function render(string $page, array $params = [])
    {
        /** makes variables available to the page */
        if (!empty($params)) {
            foreach ($params as $value) {
                if (is_array($value)) {
                    extract($value);
                }
            }
        }

        if (!strpos($this->path, "Server") && !strpos($this->path, "Modals") && empty($this->access)
            && !Safety::restrictAccess($page)) {
            return print("<h5 align='center' style='color: var(--cor-primary)'>Restricted access</h5>");
        }
        require $this->path . "/{$page}.php";
    }

    public function insertTheme(array $params = null, string $path = null)
    {
        $head = $this->seo(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            url() . "/" . theme("assets/img/loading.png"),
            url() . "/" . theme("assets/img/logo-menu.png")
        );
        /** makes variables available to the page */
        if ($params) {
            foreach ($params as $param) {
                if (!empty($param)) {
                    foreach ($param as $value) {
                        extract($value);
                    }
                }
            }
        }
        // require (!empty($path) ? $path : $this->theme . "/_theme.php");
        require (!empty($path) ? $path : $this->theme . "/index.php");
    }

    public function validate(): void
    {
        $login = (new Session())->getUser();
        /** allows or prohibits access */
        if (!empty($login) && !empty($login->group_id)) {
            $group = new Group();
            $gAccess = $group->load($login->group_id, "*", true);
            if (!$gAccess && preg_match("/[doesn't exist][inválido]/", $group->message())) {
                $createTable = new CreationProcess();
                $data = [
                    "name" => "Administrador",
                    "access" => "*",
                    "active" => 1
                ];
                $createTable->createTable(new Group, $data);
                header("Refresh: 0");
            } else {
                $this->group = (new \Models\Group())->load($this->login()->group_id);
                $this->access = $this->group->access;
            }
        } else {
            // if (!empty((new \Config\Config())->dataFile) && defined("CONF_CONNECTION")) {
            if (!defined("CONF_CONNECTION")) {
                $this->group = (new \Models\Group())->activeAll();
            }
            // if (!empty($_SESSION['login'])) {
            if (!empty($login->group_id)) {
                $this->group = (new \Models\Group())->load($_SESSION['login']->getUser()->group_id);
            }
        }
    }

    private function login()
    {
        return (new Session())->getUser();
    }

    protected function seo(string $title, string $desc, string $url, string $img, string $logo, bool $follow = false)
    {
        return compact("title","desc","url","img","logo","follow");
    }
}
