<?php

namespace _App;

class Character extends Controller
{
    protected string $page = "character";

    public function __construct()
    {
        parent::__construct(new \Models\Character());
        $this->breed = new Breed();
        $this->category = new Category();
        $this->user = new User();
    }

    public function add(): void
    {
        $act = ".add";
        $user = $this->getUser();
        $breeds = $this->breed->getBreeds();
        $categories = $this->category->getCategories();
        $this->render($this->page . $act, compact("user", "breeds", "categories"));
    }

    public function edit(array $data): void
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
        $character = $this->class->load($id);
        $breeds = $this->breed->getBreeds();
        $categories = $this->category->getCategories();
        $mission = (!empty($character->mission_id) ? $this->mission->load($character->mission_id) : null);
        $this->setPath("Modals")->render($this->page,
            compact( "act", "login", "trends1", "trends2",
                "character", "breeds", "categories", "mission" ));
    }

    public function load(int $id): \Models\Character
    {
        return $this->class->load($id);
    }

    public function search(array $search)
    {
        return $this->class->search($search);
    }

    public function list(): void
    {
        $act = ".list";
        $userId = $this->getUser()->id;
        $characters = (
            $this->class->join(
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
                "characters.user_id" => $userId
            ])
            ?? []
        );
        $this->render($this->page . $act, compact("act","characters"));
    }

    public function join(string $fields, array $entitys, array $joins, array $ons): \Models\Character
    {
        return $this->class->join($fields, $entitys, $joins, $ons);
    }

    public function save(array $data): ?string
    {
        $characters = $this->class;
        if (!empty($characters->find($data["personage"]))) {
            return print json_encode("<span class='warning'>This personage already exists</span>");
        }
        if (empty($data['story'])) {
            $data['story'] = 'Nenhuma história foi contada';
        }
        $characters->bootstrap($data);
        $characters->save();
        return print json_encode($characters->message());
    }

    public function update(array $data): string
    {
        $character = $this->class->load($data["id"]);
        $character->personage = $data["personage"];
        $character->breed_id = $data["breed_id"];
        $character->image_id = $data["image_id"];
        $character->category_id = $data["category_id"];
        $character->trend1 = $data["trend1"];
        $character->trend2 = $data["trend2"];
        $character->story = $data["story"];
        $character->save();
        return print json_encode($character->message());
    }

    public function story(array $data): void
    {
        $this->setPath("Modals")->render($this->page);
    }

    public function delete(array $data): string
    {
        $id = $data["id"];
        $character = $this->class->load($id);
        $character->destroy();
        return print $character->message();
    }
}
