<?php

namespace _App;

class Mission extends Controller
{
    protected $page = "mission";

    public function __construct()
    {
        parent::__construct();
    }

    public function init(?array $data): void
    {
        $login = $_SESSION["login"];
        $this->view->render($this->page, compact("login"));
    }

    public function add(): void
    {
        $act = "add";
        $this->view->render($this->page, compact("act"));
    }

    public function edit(array $data)
    {
        $id = $data["id"];
        $mission = (new \Models\Mission())->load($id);
        $characters_ = (new \Models\Character())->activeAll();
        $characters = $characters_;

        /** removing personage of the another mission */
        for($x = 0; $x < count($characters_); $x++) {
            if($characters_[$x]->mission_id !== null && $characters_[$x]->mission_id !== $id) {
                unset($characters[$x]);
            }
        }
        $personages = [];
        foreach((new \Models\Character())->search(["mission_id" => $id]) as $character) {
            array_push($personages, $character->id);
        }
        $this->view->setPath("Modals")->render($this->page, compact("id","mission","characters","personages"));
    }

    public function load(array $data): ?string
    {
        $name = filter_var($data["name"], FILTER_SANITIZE_STRING);
        $mission = (new \Models\Mission())->find($name);
        $dataMission = [
            "id" => $mission->id,
            "name" => $mission->name,
            "place" => $mission->place,
            "story" => $mission->story
        ];
        return print(json_encode($dataMission));
    }

    public function loadId(array $data): ?string
    {
        $id = filter_var($data["id"], FILTER_SANITIZE_STRING);
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
        $this->view->setPath("Modals")->render("map", compact("mission"));
    }

    public function personages(array $data)
    {
        $name = filter_var($data["name"], FILTER_SANITIZE_STRING);
        $mission_id = (new \Models\Mission())->find($name)->id;
        $characters = (new \Models\Character())->search(["mission_id" => $mission_id]);
        foreach($characters as $character) {
            $personages[] = $character->personage;
        }
        return print(json_encode($personages));
    }

    public function mapSave(array $data)
    {
        $maps = new \Models\Map();
        $file = $_FILES["image"];
        if($file["error"] === 0) {
            $data["image_id"] = (new \Models\Image())->fileSave($file);
        }
        $maps->bootstrap($data);
        $maps->save();
        return print(json_encode($maps->message()));
    }

    public function mapLoad(array $data): ?string
    {
        $mission_id = $data["id"];
        $maps = (new \Models\Map())->search(["mission_id" => $mission_id]);
        foreach($maps as $map) {
            $images[] = $map->image_id;
        }
        return print(json_encode($images ?? null));
    }

    public function mapEdit(array $data)
    {
        $id = $data["image_id"];
        $act = "edit";
        $image = (new \Models\Image())->load($id);
        $this->view->setPath("Modals")->render("map", compact("act","image"));
    }

    public function request(array $data)
    {
        $login = $_SESSION["login"];
        $mission_id = $data["mission_id"];
        $act = "mission_request";
        $characters = (new \Models\Character())->search([
            "name" => $login->login
        ]);
        $missionRequest = (new \Models\MissionRequest());
        $this->view->setPath("Modals")->render("character", compact("act", "mission_id", "characters", "missionRequest"));
        // var_dump(
        //     // $mission_id,
        //     // $login,
        //     $characters
        //     // $missionRequest
        // );
    }

    public function list(): void
    {
        $act = "list";
        $login = $_SESSION["login"];
        $missions = ((new \Models\Mission())->activeAll() ?? []);
        $this->view->render($this->page, compact("act", "missions","login"));
    }

    public function save(array $data)
    {
        $mission = new \Models\Mission();
        $mission->bootstrap($data);
        $mission->save();
        return print(json_encode($mission->message()));
    }

    public function update(array $data)
    {
        $id = $data["id"];
        $mission = (new \Models\Mission())->load($id);
        $mission->name = $data["name"];
        $mission->place = $data["place"];
        $mission->story = $data["story"];
        if(!empty($data["personages"])) {
            $characters = new \Models\Character();
            foreach($data["personages"] as $character_id) {
                $character_ids[] = $character_id;
                $character = $characters->load($character_id);
                $character->mission_id = $id;
                $character->save();
            }
            $removePersonages = $characters->search(["mission_id" => $id]);
            /** Removeing personages */
            foreach($removePersonages as $removePersonage){
                if(!in_array($removePersonage->id, $character_ids)) {
                    $removePersonage->mission_id = "";
                    $removePersonage->save();
                }
            }
        } else {
            $characters = (new \Models\Character())->search(["mission_id" => $id]);
            foreach($characters as $character) {
                $character->mission_id = "";
                $character->save();
            }
        }
        $mission->save();
        return print(json_encode($mission->message()));
    }

    public function delete(array $data)
    {
        $id = $data["id"];
        $mission = (new \Models\Mission())->load($id);
        $belongPersonage = (new \Models\Character())->search(["mission_id" => $id]);
        if(!empty($belongPersonage)) {
            return alertLatch("This mission belong personages");
        }
        $maps = (new \Models\Map())->search(["mission_id" => $mission->id]);
        /** deleting images */
        foreach($maps as $map) {
            (new \Models\Image())->load($map->image_id)->destroy();
        }
        $mission->destroy();
        return print(json_encode($mission->destroy()));
    }
}
