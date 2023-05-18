<?php

namespace _App;

use Core\Session;

class Mission extends Controller
{
    protected $page = "mission";

    public function init(?array $data): void
    {
        $login = (new Session())->getUser();
        $this->view->render($this->page, [ compact("login") ]);
    }

    public function add(): void
    {
        $act = "add";
        $this->view->render($this->page, [ compact("act") ]);
    }

    public function edit(array $data)
    {
        $id = $data["id"];
        $mission = (new \Models\Mission())->load($id);
        $allCharacters = (new \Models\Character())->join(
            "characters.id,login,characters.personage,characters.active,story,trend1,trend2,characters.user_id,"
            . "breed_id,image_id,players.mission_id",
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
                "characters.user_id=users.id",
                "characters.id=players.character_id"
            ]
        )
        ->where();
        $characters = $allCharacters;
        $missionRequests = (new \Models\MissionRequest)->join(
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
        $missionRequest = function ($characterId, $id) {
            return !empty(
                (new \Models\MissionRequest())->search([
                    "character_id" => $characterId,
                    "mission_id" => $id
                ])
            );
        };

        /** removing personage of the another mission */
        $personages = [];
        if (!empty($allCharacters)) {
            for ($x = 0; $x < count($allCharacters); $x++) {
                if ($allCharacters[$x]->mission_id !== null && $allCharacters[$x]->mission_id != $id) {
                    unset($characters[$x]);
                }
            }
            foreach ($allCharacters as $character) {
                if ($character->mission_id == $id) {
                    array_push($personages, $character->id);
                }
            }
        }
        $this->view->setPath("Modals")->render(
            $this->page, [ compact("id", "mission", "characters", "personages", "missionRequests", "missionRequest") ]
        );
    }

    public function load(array $data): ?string
    {
        $name = filter_var($data["name"], FILTER_UNSAFE_RAW);
        $mission = (new \Models\Mission())->load($name);
        $dataMission = [
            "id" => $mission->id,
            "name" => $mission->name,
            "place" => $mission->place,
            "story" => $mission->story
        ];
        return print($dataMission);
    }

    public function loadId(array $data): ?string
    {
        $id = filter_var($data["id"], FILTER_UNSAFE_RAW);
        $mission = (new \Models\Mission())->load($id);
        $dataMission = [
            "id" => $mission->id,
            "name" => $mission->name,
            "place" => $mission->place,
            "story" => $mission->story
        ];
        return print(json_encode($dataMission));
    }

    public function map(array $data): void
    {
        $mission = $data["mission"];
        $this->view->setPath("Modals")->render("map", [ compact("mission") ]);
    }

    public function personages(array $data)
    {
        $missionName = str_replace('_', ' ', filter_var($data["nameMission"], FILTER_UNSAFE_RAW));
        $missionId = (new \Models\Mission())->find($missionName)->id;
        $players = (new \Models\Player())->join(
            "*",
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
            "mission_id" => $missionId
        ]);
        if (!empty($players)) {
            foreach ($players as $player) {
                $personages[] = $player->personage;
            }
        } else {
            $personages = [];
        }
        return print(json_encode($personages));
    }

    public function mapSave(array $data)
    {
        $maps = new \Models\Map();
        $file = $_FILES["image"];
        if ($file["error"] === 0) {
            $data["image_id"] = (new \Models\Image())->fileSave($file);
        }
        $maps->bootstrap($data);
        $maps->save();
        return print($maps->message());
    }

    public function mapLoad(array $data): ?string
    {
        $idMission = $data["id"];
        $images = [];
        $maps = (new \Models\Map())->search(["mission_id" => $idMission]);
        if ($maps) {
            foreach ($maps as $map) {
                $images[] = [
                    'image_id' => $map->image_id,
                    'name' => $map->name
                ];
            }
        }
        return print(json_encode($images));
        // return print(json_encode($images) ?? null);
    }

    public function mapEdit(array $data)
    {
        $id = $data["image_id"];
        $act = "edit";
        $image = (new \Models\Image())->load($id);
        $this->view->setPath("Modals")->render("map", [ compact("act","image") ]);
    }

    public function list(): void
    {
        $act = "list";
        $login = $_SESSION["login"];
        $missions = ((new \Models\Mission())->activeAll() ?? []);
        $groupId = (new \Models\User())->find($login->login)->group_id;
        $group = (!empty($groupId) ? (new \Models\Group())->load($groupId) : null);

        $this->view->render($this->page, [ compact("act", "missions", "login", "group") ]);
    }

    public function save(array $data)
    {
        $mission = new \Models\Mission();
        $mission->bootstrap($data);
        $mission->save();
        return print($mission->message());
    }

    public function update(array $data)
    {
        $mission = (new \Models\Mission())->load($data["id"]);
        $mission->name = $data["name"];
        $mission->place = $data["place"];
        $mission->story = $data["story"];
        $mission->save();
        $players = (new \Models\Player())->find([
            "mission_id" => $data["id"]
        ]);
        if (!empty($players)) {
            foreach ($players as $player) {
                if (empty($data["personages-remove"])
                    || !in_array($player->character_id, $data["personages-remove"])) {
                    $player->destroy();
                }
            }
        }
        if (!empty($data["personages-add"])) {
            foreach ($data["personages-add"] as $characterId) {
                $characterIds[] = $characterId;
                $userId = (new \Models\Character())->load($characterId)->user_id;
                $player = new \Models\Player();
                $player->bootstrap([
                    "character_id" => $characterId,
                    "mission_id" => $data["id"],
                    "user_id" => $userId
                ]);
                $player->save();
                if (strpos('success', $player->message()) !== -1) {
                    $missionRequests = (new \Models\MissionRequest())->search([
                        "character_id" => $characterId
                    ]);
                    foreach ($missionRequests as $missionRequest) {
                        $missionRequest->destroy();
                    }
                }
            }
        }
        return print($mission->message());
    }

    public function delete(array $data)
    {
        $id = $data["id"];
        $mission = (new \Models\Mission())->load($id);
        $belongPersonage = (new \Models\Character())->search(["mission_id" => $id]);
        if (!empty($belongPersonage)) {
            return alertLatch("This mission belong personages");
        }
        $maps = (new \Models\Map())->search(["mission_id" => $mission->id]);
        /** deleting images */
        foreach ($maps as $map) {
            (new \Models\Image())->load($map->image_id)->destroy();
        }
        $mission->destroy();
        return print($mission->destroy());
    }
}
