<?php

namespace _App;

use Models\Photo;

class Character extends Controller
{
    protected $page = "character";

    public function __construct()
    {
        parent::__construct();
    }

    public function init(?array $data): void
    {
        $this->view->render($this->page);
    }

    public function add(): void
    {
        $act = "add";
        $login = $_SESSION["login"];
        $breeds = (new \Models\Breed())->activeAll();
        $classes = (new \Models\Category())->activeAll();
        $this->view->render($this->page, compact("act", "login", "breeds", "classes"));
    }

    public function edit(array $data)
    {
        $act = "edit";
        $login = $_SESSION["login"];
        $id = $data["id"];
        $breed_id = $data["breed_id"];
        $category_id = $data["category_id"];
        $character = (new \Models\Character())->load($id);
        $breed = (new \Models\Breed())->load($breed_id);
        $category = (new \Models\Category())->load($category_id);
        $this->view->setPath("Modals")->render($this->page, compact("act","login","character","breed","category"));
    }

    public function list()
    {
        $act = "list";
        $characters = ((new \Models\Character())->activeAll() ?? []);
        $this->view->render($this->page, compact("act","characters"));
    }

    public function save(array $data)
    {
        $characters = new \Models\Character();
        if(empty($characters->find($data["personage"]))) {
            $characters->bootstrap($data);
        } else {
            return print(json_encode("This personage already exists"));
        }
        $characters->save();
        return print(json_encode($characters->message()));
    }

    public function story(array $data): void
    {
        $this->view->setPath("Modals")->render($this->page);
    }

    public function delete(array $data)
    {
        $id = $data["id"];
        $character = (new \Models\Character())->load($id);
        $character->destroy();
        return print(json_encode($character->message()));
    }
}
