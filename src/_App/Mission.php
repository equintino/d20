<?php

namespace _App;

class Mission extends Controller
{
    public string $page = "mission";

    public function __construct()
    {
        parent::__construct(new \Models\Mission());
    }

    public function _init(): void
    {
        $login = $this->session()->getUser();
        $group = $this->group()->load($login->group_id);
        $this->render($this->page, compact("login", "group"));
    }

    public function add(): void
    {
        $act = "add";
        $this->render($this->page, compact("act"));
    }

    public function edit(array $data)
    {
        $id = $data["id"];
        $mission = $this->class->load($id);
        $allCharacters = $this->character()->join(
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
        $missionRequests = $this->MissionRequest()->join(
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
                $this->MissionRequest()->search([
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
        $this->setPath("Modals")->render(
            $this->page, compact("id", "mission", "characters", "personages", "missionRequests", "missionRequest")
        );
    }

    public function load(array $data): ?string
    {
        $name = filter_var($data["name"], FILTER_UNSAFE_RAW);
        $mission = $this->class->load($name);
        $dataMission = [
            "id" => $mission->id,
            "name" => $mission->name,
            "place" => $mission->place,
            "story" => $mission->story
        ];
        return print $dataMission;
    }

    public function loadId(array $data): ?string
    {
        $id = filter_var($data["id"], FILTER_UNSAFE_RAW);
        $mission = $this->class->load($id);
        $dataMission = [
            "id" => $mission->id,
            "name" => $mission->name,
            "place" => $mission->place,
            "story" => $mission->story
        ];
        return print json_encode($dataMission);
    }

    public function _map(array $data): void
    {
        $mission = $this->class->load($data['mission']);
        $this->setPath("Modals")->render("map", compact("mission"));
    }

    public function personages(array $data): string
    {
        $idMission = filter_var($data['id']);
        $players = $this->Player()->join(
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
            "mission_id" => $idMission
        ]);
        if (!empty($players)) {
            foreach ($players as $player) {
                $personages[] = $player->personage;
            }
        } else {
            $personages = [];
        }
        return print json_encode($personages);
    }

    public function mapSave(array $data): ?string
    {
        $map = $this->map();
        if (!empty($data['id'])) {
            $map = $map->load($data['id']);
        }
        $file = $_FILES["image"];
        if ($file["error"] === 0) {
            $idImage = ($map->image_id ?? null);
            $data["image_id"] = $this->image()->fileSave($file, $idImage);
        }
        $map->bootstrap($data);
        $map->save();
        return print json_encode($map->message());
    }

    public function mapLoad(array $data): ?string
    {
        $idMission = $data["id"];
        $images = [];
        $maps = $this->map()->search(["mission_id" => $idMission]);
        if ($maps) {
            foreach ($maps as $map) {
                $images[] = [
                    'id' => $map->id,
                    'name' => $map->name,
                    'description' => $map->description,
                    'image_id' => $map->image_id
                ];
            }
        }
        return print json_encode($images);
    }

    public function mapEdit(array $data): void
    {
        $map = $this->map()->load($data['id']);
        $image = $this->image()->load($data['image_id']);
        $this->setPath("Modals")->render("map", compact("image", "map"));
    }

    public function mapDelete(array $data): ?string
    {
        $map = $this->map()->load($data["id"]);
        $map->destroy();
        return print json_encode($map->message());
    }

    public function list(): void
    {
        $act = "list";
        $login = $_SESSION["login"];
        $missions = ($this->class->activeAll() ?? []);
        $groupId = $this->user()->find($login->login)->group_id;
        $group = (!empty($groupId) ? $this->group()->load($groupId) : null);

        $this->render($this->page, compact("act", "missions", "login", "group"));
    }

    public function save(array $data)
    {
        $mission = $this->class;
        $mission->bootstrap($data);
        $mission->save();
        return print $mission->message();
    }

    public function update(array $data)
    {
        $mission = $this->class->load($data["id"]);
        $mission->name = $data["name"];
        $mission->place = $data["place"];
        $mission->story = $data["story"];
        $mission->save();
        $players = $this->player()->find([
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
                $userId = $this->character()->load($characterId)->user_id;
                $player = $this->player();
                $player->bootstrap([
                    "character_id" => $characterId,
                    "mission_id" => $data["id"],
                    "user_id" => $userId
                ]);
                $player->save();
                if (strpos('success', $player->message()) !== -1) {
                    $missionRequests = $this->missionRequest()->search([
                        "character_id" => $characterId
                    ]);
                    foreach ($missionRequests as $missionRequest) {
                        $missionRequest->destroy();
                    }
                }
            }
        }
        return print $mission->message();
    }

    public function delete(array $data): string
    {
        $id = $data["id"];
        $mission = $this->class->load($id);
        $belongPersonage = $this->character()->search(["mission_id" => $id]);
        if (!empty($belongPersonage)) {
            return alertLatch("This mission belong personages");
        }
        $maps = $this->map()->search(["mission_id" => $mission->id]);
        /** deleting images */
        foreach ($maps as $map) {
            $this->image()->load($map->image_id)->destroy();
        }
        $mission->destroy();
        return print json_encode($mission->message());
    }
}
