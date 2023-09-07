<?php

namespace _App;

class Web
{
    private object $class;
    private string $path;

    public function __construct()
    {
        $this->class = new \Views\Web();
        $this->setPath('pages');
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
    // public function init(): void
    // {
    //     $session = new \Core\Session();
    //     $id = $session->getUser()->group_id;
    //     $params['group'] = (new Group())->getThisGroup($id);
    //     $head = $this->seo(
    //         CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
    //         CONF_SITE_DESC,
    //         url(),
    //         url() . "//" . theme("assets/img/loading.png"),
    //         url() . "//" . theme("assets/img/logo-menu.png")
    //     );
    //     $this->class->insertTheme($params, $head);
    // }

    public function render(string $page, array $params = []): void
    {
        $session = new \Core\Session();
        $id = !empty($session->getUser()->login)? $session->getUser()->group_id : null;
        $params['group'] = $id ? (new Group())->getThisGroup($id) : null;
        $params['head'] = $this->seo(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            url() . "//" . theme("assets/img/loading.png"),
            url() . "//" . theme("assets/img/logo-menu.png")
        );
        // $session = new \Core\Session();
        // if ($session->getUser()) { $this->init($session); }

        $this->class->render($this->path . "/{$page}", $params);
    }

    public function setPath(string $path): Web
    {
        $this->path = __DIR__ . "/../{$path}";
        return $this;
    }

    protected function seo(
        string $title, string $desc, string $url, string $img, string $logo, bool $follow = false
    )
    {
        return compact("title", "desc", "url", "img", "logo", "follow");
    }
}
