<?php

namespace _App;

use Traits\ClassTraits;
use Views\View;
use Core\Session;

abstract class Controller
{
    use ClassTraits;

    protected $path;
    protected $view;
    protected $seo;
    protected $loading;

    public function __construct()
    {
        $this->view = new View();
        $this->path  = __DIR__ . "/../pages";
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
        $this->view->render($this->path . "/{$page}", $params);
    }
}
