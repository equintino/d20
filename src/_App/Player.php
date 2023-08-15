<?php

namespace _App;

use Models\Photo;

class Player extends Controller
{
    protected $page = "player";

    public function init(?array $data): void
    {
        $players = (new \Models\Player())->join(
            "players.id,players.character_id,users.login,missions.name,characters.active,"
            . "characters.personage,trend1,trend2",
            [
                "users",
                "characters",
                "players",
                "missions"
            ],
            [
                "RIGHT JOIN",
                "RIGHT JOIN",
                "LEFT JOIN"
            ],
            [
                "characters.user_id=users.id",
                "players.character_id=characters.id",
                "mission_id=missions.id"
            ]
        )->where();
        $this->render($this->page, compact("players"));
    }

    public function add(): void
    {
        $act = "add";
        $login = $_SESSION["login"];
        $breeds = (new \Models\Breed())->activeAll();
        $classes = (new \Models\Category())->activeAll();
        $this->render($this->page, compact("act", "login", "breeds", "classes"));
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
        $this->setPath("Modals")->render($this->page,
                compact("act", "login", "trends1", "trends2",
                "character", "breeds", "categories", "mission")
        );
    }

    public function list()
    {
        $act = "list";
        $players = ((new \Models\Player())->search(["user_id" => $_SESSION["login"]->id]) ?? []);
        $this->render($this->page, compact("act", "players"));
    }

    public function save(array $data)
    {
        $player = new \Models\Player();
        if (empty($player->find([ "character_id" => $data["character_id"] ]))) {
            $player->bootstrap($data);
        } else {
            return print json_encode("This player has been in a mission");
        }
        $player->save();
        return print json_encode($player->message());
    }

    public function update(array $data): string
    {
        $player = (new \Models\Player())->load($data["id"]);
        $player->user_id = $data["user_id"];
        $player->character_id = $data["character_id"];
        $player->mission_id = $data["mission_id"];
        $player->save();
        return print json_encode($player->message());
    }

    public function story(array $data): void
    {
        $this->setPath("Modals")->render($this->page);
    }

    public function delete(array $data): string
    {
        $id = $data["id"];
        $player = (new \Models\Player())->load($id);
        $player->destroy();
        return print json_encode($player->message());
    }
}
