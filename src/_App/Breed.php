<?php

namespace _App;

class Breed extends Controller
{
    protected $page = "breed";

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
        $this->view->render($this->page, compact("act"));
    }

    public function list(): void
    {
        $act = "list";
        $breeds = (new \Models\Breed())->activeAll();
        $this->view->render($this->page, compact("act", "breeds"));
    }

    public function getBreeds(array $data): string
    {
        $search = [
            "breed_id" => $data["breed_id"],
            "category_id" => $data["category_id"]
        ];
        $avatars = (new \Models\Avatar())->search($search);
        foreach($avatars as $avatar) {
            $response[] = [
                "id" => $avatar->id,
                "image_id" => $avatar->image_id
            ];
        }
        return print(json_encode($response ?? "This breed has no definite image"));
    }

    public function edit(array $data): void
    {
        $id = $data["id"];
        $breed = (new \Models\Breed())->load($id);
        $act = "edit";
        $this->view->setPath("Modals")->render($this->page, compact("act", "breed"));
    }

    public function avatar(): void
    {
        $act = "avatar";
        $breeds = (new \Models\Breed())->activeAll();
        $categories = (new \Models\Category())->activeAll();
        $this->view->render($this->page, compact("act", "breeds", "categories"));
    }

    // public function edit(array $data): void
    // {
    //     $breeds = (new \Models\Breed())->activeAll();
    //     $act = "edit";
    //     foreach($breeds as $breed) {
    //         $list[] = [
    //             "id" => $breed->id,
    //             "image_id" => $breed->image_id
    //         ];
    //     }
    //     $this->view->setPath("Modals")->render($this->page, compact("list", "act", "breeds"));
    // }

    public function show(array $data): void
    {
        $list = $data["response"];
        $act = "list";
        $this->view->setPath("Modals")->render($this->page, compact("list", "act"));
    }

    public function showImage(array $data): void
    {
        $id = $data["id"];
        $breed = (new \Models\Breed())->load($id);
        $type = $breed->type;
        header("Content-Type: {$type}");
        echo $breed->image;
    }

    public function save(array $data)
    {
        $breeds = new \Models\Breed();
        if(count($breeds->find($data["name"])) > 0) {
            return print(json_encode("This breed already exists"));
        }
        if($_FILES["image"]["error"] === 0) {
            $data["image_id"] = (new \Models\Image())->fileSave($_FILES["image"]);
        }
        $breeds->bootstrap($data);
        $breeds->save();
        return print(json_encode($breeds->message()));
    }
}
