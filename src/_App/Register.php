<?php

namespace _App;

class Register extends Controller
{
    public function add(array $data): void
    {
        $this->view->setPath('Modals')->render('register');
    }
}
