<?php

namespace _App;

use Models\Photo;

class Player extends Controller
{
    protected $page = "player";

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
        $trends1 = [
            "good" => "BOM",
            "neutral" => "NEUTRO",
            "bad" => "MAU"
        ];
        $trends2 = [
            "leal" => "LEAL",
            "neutral" => "NEUTRO",
            "chaotic" => "CAÓTICO"
        ];
        $character = (new \Models\Character())->load($id);
        $breeds = (new \Models\Breed())->activeAll();
        $categories = (new \Models\Category())->activeAll();
        $mission = (!empty($character->mission_id) ? (new \Models\Mission())->load($character->mission_id) : null);
        $this->view->setPath("Modals")->render($this->page, compact("act","login","trends1","trends2","character","breeds","categories","mission"));
    }

    public function list()
    {
        $act = "list";
        $characters = ((new \Models\Character())->search(["name" => $_SESSION["login"]->login]) ?? []);
        $this->view->render($this->page, compact("act","characters"));
    }

    public function save(array $data)
    {
        $characters = new \Models\Character();
        if(empty($characters->find($data["personage"]))) {
            $characters->bootstrap($data);
        } else {
            return print(json_encode("This player already exists"));
        }
        $characters->save();
        return print(json_encode($characters->message()));
    }

    public function update(array $data): string
    {
        $character = (new \Models\Character())->load($data["id"]);
        $character->personage = $data["personage"];
        $character->breed_id = $data["breed_id"];
        $character->image_id = $data["image_id"];
        $character->category_id = $data["category_id"];
        $character->trend1 = $data["trend1"];
        $character->trend2 = $data["trend2"];
        $character->story = $data["story"];
        $character->save();
        return print(json_encode($character->message()));
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
