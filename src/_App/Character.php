<?php

namespace _App;

use Core\Session;
use Models\Mission;
use Models\Breed;
use Models\Category;
use Models\Photo;

class Character extends Controller
{
    protected $page = "character";

    public function init(?array $data): void
    {
        $this->view->render($this->page);
    }

    public function add(): void
    {
        $act = ".add";
        $login = (new Session())->getUser();
        $breeds = (new Breed())->activeAll();
        $classes = (new Category())->activeAll();

        $this->view->render($this->page . $act, [ compact("login", "breeds", "classes") ]);
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
        $breeds = (new Breed())->activeAll();
        $categories = (new Category())->activeAll();
        $mission = (!empty($character->mission_id) ? (new Mission())->load($character->mission_id) : null);
        $this->view->setPath("Modals")->render($this->page, [ compact( "act", "login", "trends1", "trends2",
        "character", "breeds", "categories", "mission" ) ]);
    }

    public function list()
    {
        $act = ".list";
        $login = $_COOKIE['login'];
        $userId = (new \Models\User())->find(['login' => $login])[0]->id;
        $characters = (
            (new \Models\Character())->join(
                "characters.id,image_id,breed_id,category_id,story,players.mission_id,personage",
                [
                    "characters",
                    "players"
                ],
                [
                    "LEFT JOIN"
                ],
                [
                    "characters.id=players.character_id"
                ]
            )
            ->where([
                // "characters.user_id" => $_SESSION["login"]->getUser()->id
                "characters.user_id" => $userId
            ])
            ?? []
        );
        $this->view->render($this->page . $act, [ compact("act","characters") ]);
    }

    public function save(array $data)
    {
        $characters = new \Models\Character();
        if (empty($characters->find($data["personage"]))) {
            $characters->bootstrap($data);
        } else {
            return print(json_encode("This personage already exists"));
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
