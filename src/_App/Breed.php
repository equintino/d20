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

    public function edit(array $data): void
    {
        $id = $data["id"];
        $breed = (new \Models\Breed())->load($id);
        $this->view->setPath("Modals")->render($this->page, compact("breed"));
    }

    public function load(array $data)
    {
        $id = $data["id"];
        $breed = (new \Models\Breed())->load($id);

        return print(json_encode([
            "name" => $breed->name,
            "description" => $breed->description,
            "image_id" => $breed->image_id
        ]));
    }

    // public function avatar(): void
    // {
    //     $act = "avatar";
    //     $breeds = (new \Models\Breed())->activeAll();
    //     $categories = (new \Models\Category())->activeAll();
    //     $this->view->render($this->page, compact("act", "breeds", "categories"));
    // }

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
        $breed = ((new \Models\Breed())->find($data["name"])[0] ?? new \Models\Breed());
        if($_FILES["image"]["error"] === 0) {
            if(empty($breed->image_id)) {
                $data["image_id"] = (new \Models\Image())->fileSave($_FILES["image"]);
            } else {
                $image = (new \Models\Image())->load($breed->image_id);
                $image->fileSave($_FILES["image"]);
            }
        }
        $breed->bootstrap($data);
        $breed->save();
        return print(json_encode($breed->message()));
    }

    public function delete(array $data)
    {
        $breed = (new \Models\Breed())->find($data["name"])[0];
        return print(json_encode($breed->destroy()));
    }
}