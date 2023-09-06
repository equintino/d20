<?php

namespace _App;

use Traits\ClassTraits;
use Views\View;
use Core\Session;

abstract class Controller
{
    use ClassTraits;

    protected $path;

    public function __construct(object $class = null)
    {
        // $this->initClass();
        $this->class = $class;
        $this->web = new Web();
        $this->session = new \Core\Session();
        // $this->path  = __DIR__ . "/../pages";
        // echo '<pre>';
        // var_dump(
        //     $this,
        //     $class
        // );die;
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

    // protected function seo(
    //     string $title, string $desc, string $url, string $img, string $logo, bool $follow = false
    // )
    // {
    //     return compact("title", "desc", "url", "img", "logo", "follow");
    // }

    protected function getUser()
    {
        return $this->session->getUser();
    }

    protected function setPath(string $path): Web
    {
        return $this->web->setPath($path);
    }

    // protected function render(string $page, array $params = []): void
    // {
    //     $this->view->render($this->path . "/{$page}", $params);
    // }

    protected function render()
    {
        $this->web->render($this->page);
    }
}
