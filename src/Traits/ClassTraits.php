<?php

namespace Traits;

use Views\View;
use Core\Login;
use Core\Session;
use Config\Config;
use Models\Group;
use Models\Breed;
use Models\Category;
use Models\Character;
use Models\Mission;
use Models\MissionRequest;
use Models\User;
use Models\Avatar;
use Models\Image;
use Models\Player;
use Models\Map;
use Models\Documentation;

trait ClassTraits {
    protected $class;

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

    public function config(): Config
    {
        return new Config();
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

    public function missionRequest(): MissionRequest
    {
        return new MissionRequest();
    }

    public function user(): User
    {
        return new User();
    }

    public function avatar(): Avatar
    {
        return new Avatar();
    }

    public function image(): Image
    {
        return new Image();
    }

    public function player(): Player
    {
        return new Player();
    }

    public function map(): Map
    {
        return new Map();
    }

    public function documentation(): Documentation
    {
        return new Documentation();
    }
}