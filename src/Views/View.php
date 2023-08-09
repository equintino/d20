<?php

namespace Views;

class View
{
    private $path;
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

    public function insertTheme(array $params = null, string $path = null, $head): void
    {
        /** makes variables available to the page */
        if ($params) {
            extract($params);
        }
        include_once $this->theme . '/index.php';
        // require_once !empty($path) ? $path : $this->theme . "/index.php";
    }
}
