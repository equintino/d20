<?php

namespace _App;

class Avatar extends Controller
{
    protected $page = "avatar";

    public function __construct()
    {
        parent::__construct();
    }

    public function init(?array $data): void
    {
        // (new \Models\Avatar())->createThisTable();
        $this->view->render($this->page);
    }

    public function add(): void
    {
        $act = "add";
        $breeds = (new \Models\Breed())->activeAll();
        $categories = (new \Models\Category())->activeAll();
        $this->view->render($this->page, compact("act", "breeds", "categories"));
    }

    public function list(): void
    {
        $act = "list";
        $avatars = (new \Models\Avatar())->activeAll();
        $this->view->render($this->page, compact("act", "avatars"));
    }

    // public function getBreeds(array $data): string
    // {
    //     $search = [
    //         "name" => $data["breed"],
    //         "class" => $data["category"]
    //     ];
    //     $breeds = (new \Models\Breed())->search($search);
    //     foreach($breeds as $breed) {
    //         $response[] = [
    //             "id" => $breed->id,
    //             "image_id" => $breed->image_id
    //         ];
    //     }
    //     return print(json_encode($response ?? "This breed has no definite image"));
    // }

    public function edit(array $data): void
    {
        $id = $data["id"];
        $avatar = (new \Models\Avatar())->load($id);
        $act = "edit";
        $this->view->setPath("Modals")->render($this->page, compact("act", "avatar"));
    }

    // public function avatar(): void
    // {
    //     $act = "avatar";
    //     $breeds = (new \Models\Breed())->activeAll();
    //     $categories = (new \Models\Category())->activeAll();
    //     $this->view->render($this->page, compact("act", "breeds", "categories"));
    // }

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

    // public function showImage(array $data): void
    // {
    //     $id = $data["id"];
    //     $breed = (new \Models\Breed())->load($id);
    //     $type = $breed->type;
    //     header("Content-Type: {$type}");
    //     echo $breed->image;
    // }

    public function save(array $data)
    {
        $files = $_FILES["image"];
        $avatars = new \Models\Avatar();
        for($x = 0; $x < count($files["name"]); $x++) {
            $file["name"] = $files["name"][$x];
            $file["type"] = $files["type"][$x];
            $file["tmp_name"] = $files["tmp_name"][$x];
            $file["size"] = $files["size"][$x];
            if($files["error"][$x] === 0) {
                $data["image_id"] = (new \Models\Image())->fileSave($file);
            }
            $avatars->bootstrap($data);
            $avatars->save();
        }
        return print(json_encode($avatars->message()));
    }
}
