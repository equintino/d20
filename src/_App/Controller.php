<?php

namespace _App;

use Traits\ClassTraits;

abstract class Controller
{
    use ClassTraits;

    protected $view;
    protected $path;

    public function __construct(object $class = null)
    {
        $this->class = $class;
        $this->view = $this->view();
        $this->path  = __DIR__ . "/../pages";
    }

    public function _init(): void
    {
        $this->render($this->page);
    }

    protected function getPost($data): array
    {
        foreach ($data as $key => $value) {
            $params[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $params;
    }

    protected function getGet($data): array
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
        return $this->session()->getUser();
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
