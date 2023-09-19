<?php

namespace _App;

class MissionRequest extends Controller
{
    protected string $page = 'mission';

    public function __construct()
    {
        parent::__construct(new \Models\MissionRequest());
        $this->player = new Player();
        $this->character = new Character();
    }

    public function init(?array $data): void
    {
        $login = $this->getUser();
        $mission_id = $data["mission_id"];
        $act = $data["act"];
        $players = $this->player->join(
            "characters.id,personage,users.login,characters.user_id",
            [
                "users",
                "characters",
                "players"
            ],
            [
                "RIGHT JOIN",
                "LEFT JOIN"
            ],
            [
                "users.id=characters.user_id",
                "players.character_id=characters.id"
            ]
        )
        ->where([
            "users.id" => $login->id,
            "players.mission_id" => null
        ]);
        $this->setPath("Modals")->render($this->page, compact("act", "mission_id", "players"
        ));
    }

    public function getMissionRequest(int $id): array
    {
        return $this->class->join(
            "mission_requests.id, player, character_id, mission_requests.mission_id,
            characters.personage, missions.name",
            [
                "mission_requests",
                "characters",
                "missions"
            ],
            [
                "LEFT JOIN",
                "JOIN"
            ],
            [
                "mission_requests.character_id=characters.id",
                "mission_requests.mission_id=missions.id"
            ]
        )
        ->where([
            "mission_requests.mission_id" => $id
        ]);
    }

    public function search(array  $search): array
    {
        return $this->class->search($search);
    }

    public function request(array $data): string
    {
        $data["character_id"] = (int) $data["character_id"];
        $data["mission_id"] = (int) $data["mission_id"];
        $missionRequest = $this->class;
        $missionRequest->bootstrap($data);
        $missionRequest->save();
        return print json_encode($missionRequest->message());
    }

    public function save(array $data)
    {
        $action = $data["action"];
        $missionRequest = $this->class->load($data["missionR"]);

        if ($action === "reject") {
            $missionRequest->destroy();
            return print json_encode($missionRequest->message());
        }
        if ($action === "acept") {
            $character = $this->character->load($missionRequest->character_id);
            $character->mission_id = (int) $data["missionR"];
            $character->save();
            return print json_encode($character->message());
        }
    }
}
