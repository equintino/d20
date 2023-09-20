<?php

namespace _App;

class Player extends Controller
{
    protected $page = "player";

    public function __construct()
    {
        parent::__construct(new \Models\Player());
    }

    public function init(?array $data): void
    {
        $login = $this->getUser()->login;
        $players = $this->class->join(
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
        $this->render($this->page, compact("login", "players"));
    }

    public function find(array $search)
    {
        return $this->class->find($search);
    }

    public function join(string $fields, array $entitys, array $joins, array $ons): \Models\Player
    {
        return $this->class->join($fields, $entitys, $joins, $ons);
    }

    public function save(array $data): string
    {
        $player = $this->class;
        if (empty($player->find([ "character_id" => $data["character_id"] ]))) {
            $player->id = null;
            $player->bootstrap($data);
        } else {
            return print json_encode("This player has been in a mission");
        }
        $player->save();
        return json_encode($player->message());
    }

    public function delete(array $data): string
    {
        $id = $data["id"];
        $player = $this->class->load($id);
        $player->destroy();
        return print json_encode($player->message());
    }
}
