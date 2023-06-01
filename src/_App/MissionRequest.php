<?php

namespace _App;

class MissionRequest extends Mission
{
    public function init(?array $data): void
    {
        $login = $_SESSION["login"];
        $mission_id = $data["mission_id"];
        $act = $data["act"];
        $players = (new \Models\Player())->join(
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
        $this->view->setPath("Modals")->render($this->page, [ compact("act", "mission_id", "players"
        ) ]);
    }

    public function request(array $data): string
    {
        $data["character_id"] = (int) $data["character_id"];
        $data["mission_id"] = (int) $data["mission_id"];
        $missionRequest = new \Models\MissionRequest();
        $missionRequest->bootstrap($data);
        $missionRequest->save();
        return print(json_encode($missionRequest->message()));
    }

    public function save(array $data)
    {
        $action = $data["action"];
        $missionRequest = (new \Models\MissionRequest())->load($data["missionR"]);

        if ($action === "reject") {
            $missionRequest->destroy();
            return print(json_encode($missionRequest->message()));
        }
        if ($action === "acept") {
            $character = (new \Models\Character())->load($missionRequest->character_id);
            $character->mission_id = (int) $data["missionR"];
            $character->save();
            return print(json_encode($character->message()));
        }
    }
}
