<?php

namespace _App;

class Web extends Controller
{
    /** no login */
    public function start(): void
    {
        $this->setPath('public')->render('index');
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
        if ($this->getUser()) { $this->init(); }

        $this->view->render($this->path . "/{$page}", $params);
    }
}
