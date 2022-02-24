<?php

namespace _App;

class Category extends Controller
{
    protected $page = "category";

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
        $categories = (new \Models\Category())->activeAll();
        $this->view->render($this->page, compact("act", "categories"));
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
        $category = (new \Models\Category())->load($id);
        $act = "edit";
        $this->view->setPath("Modals")->render($this->page, compact("act", "category"));
    }

    // public function avatar(): void
    // {
    //     $act = "avatar";
    //     $breeds = (new \Models\Breed())->activeAll();
    //     $categories = (new \Models\Category())->activeAll();
    //     var_dump($categories);die;
    //     $this->view->render($this->page, compact("act", "breeds"));
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
        $categories = new \Models\Category();
        if(count($categories->find($data["name"])) > 0){
            return print(json_encode("This class already exists"));
        }
        if($_FILES["image"]["error"] === 0) {
            $data["image_id"] = (new \Models\Image())->fileSave($_FILES["image"]);
        }
        $categories->bootstrap($data);
        $categories->save();
        return print(json_encode($categories->message()));
    }
}
