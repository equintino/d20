<?php

namespace Views;

class View
{
    public $theme;
    public $path;

    public function __construct(
        string $theme = __DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/",
        string $path = '/../pages'
    )
    {
        $this->theme = $theme;
        $this->path  = __DIR__ . $path;
    }

    public function render(string $page, array $params = []): void
    {
        /** makes variables available to the page */
        if (!empty($params)) {
            extract($params);
        }

        include_once "{$page}.php";
    }

    public function insertTheme(array $params, array $head): void
    {
        $params['head'] = $head;
        /** makes variables available to the page */
        if ($params) {
            extract($params);
        }
        include_once $this->theme . '/index.php';
    }
}
