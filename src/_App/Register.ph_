<?php

namespace _App;

use Models\Group;

class Register extends Controller
{
    public function add(array $data): void
    {
        $groups = (new Group())->activeAll();
        // $this->view->setPath('Modals')->render('register', [ compact('groups') ]);
        $this->setPath('Modals')->render('register', [ compact('groups') ]);
    }
}
