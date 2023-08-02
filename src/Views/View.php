<?php

namespace Views;

use Core\Session;
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
    }

    public function setPath(string $path): View
    {
        $this->path = __DIR__ . "/../{$path}";
        return $this;
    }

    public function render(string $page, array $params): void
    {
        /** makes variables available to the page */
        if (!empty($params)) {
            foreach ($params as $value) {
                if (is_array($value)) {
                    extract($value);
                }
            }
        }

        include_once "{$page}.php";
    }

    public function insertTheme(array $params = null, string $path = null): void
    {
        $head = $this->seo(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            url() . "/test/" . theme("assets/img/loading.png"),
            url() . "/test/" . theme("assets/img/logo-menu.png")
        );
        /** makes variables available to the page */
        if ($params) {
            extract($params);
        }
        require_once !empty($path) ? $path : $this->theme . "/index.php";
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
            if (!defined("CONF_CONNECTION")) {
                $this->group = (new \Models\Group())->activeAll();
            }
            if (!empty($login->group_id)) {
                $this->group = (new \Models\Group())->load($_SESSION['login']->getUser()->group_id);
            }
        }
    }

    private function login(): object
    {
        return (new Session())->getUser();
    }

    protected function seo(
        string $title, string $desc, string $url, string $img, string $logo, bool $follow = false): array
    {
        return compact("title","desc","url","img","logo","follow");
    }
}
