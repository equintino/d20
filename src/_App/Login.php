<?php

namespace _App;

class Login extends Controller {

    public function __construct()
    {
        parent::__construct(new \Core\Login());
        $this->web = new Web();
        $this->group = new Group();
        $this->user = new User();
    }

    public function start(): void
    {
        $this->web->setPath('public')->render('index');
    }

    public function login(): void
    {
        $this->web->setPath('pages')->render('login');
    }

    public function register(): void
    {
        $groups = $this->group->getListGroup();
        $this->web->setPath('Modals')->render('register', compact('groups'));
    }

    public function save(array $data): string
    {
        return $this->user->save($data);
    }

    public function enter(array $data): ?string
    {
        extract($data);
        $lg = $this->class->user($login, $password, $db);
        $lg->validate();
        return print $lg->message ?? null;
    }

    public function error(array $data)
    {
        $this->web->error($data);
    }
}
