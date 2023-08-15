<?php

namespace Traits;

use Models\Group;
use Core\Login;

trait ClassTraits {
    public function group(): Group
    {
        return new Group();
    }

    public function login(): Login
    {
        return new Login();
    }
}