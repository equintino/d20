<?php

namespace _App;

use Traits\ClassTraits;

abstract class Controller
{
    use ClassTraits;

    protected $path;

    public function __construct(object $class = null)
    {
        $this->class = $class;
        $this->web = new Web();
        $this->session = new \Core\Session();
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

    protected function getUser()
    {
        return $this->session->getUser();
    }

    protected function setPath(string $path): Web
    {
        return $this->web->setPath($path);
    }

    protected function render(string $page, array $params = [])
    {
        $this->web->render($page, $params);
    }
}
