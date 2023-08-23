<?php

namespace Traits;

use Views\View;
use Core\Login;
use Core\Session;
use Models\Group;
use Models\Breed;
use Models\Category;
use Models\Character;
use Models\Mission;
use Models\User;

trait ClassTraits {
    public function view(): View
    {
        return new View();
    }

    public function login(): Login
    {
        return new Login();
    }

    public function session(): Session
    {
        return new Session();
    }

    public function group(): Group
    {
        return new Group();
    }

    public function breed(): Breed
    {
        return new Breed();
    }

    public function category(): Category
    {
        return new Category();
    }

    public function character(): Character
    {
        return new Character();
    }

    public function mission(): Mission
    {
        return new Mission();
    }

    public function user(): User
    {
        return new User();
    }
}