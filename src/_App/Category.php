<?php

namespace _App;

class Category extends Controller
{
    protected $page = "category";

    public function init(?array $data): void
    {
        $this->view->render($this->page);
    }

    public function add(): void
    {
        $act = "add";
        $this->view->render($this->page, [ compact("act") ]);
    }

    public function list(): void
    {
        $act = "list";
        $categories = (new \Models\Category())->activeAll();
        $this->view->render($this->page, [ compact("act", "categories") ]);
    }

    public function edit(array $data): void
    {
        $id = $data["id"];
        $category = (new \Models\Category())->load($id);
        $this->view->setPath("Modals")->render($this->page, [ compact("category") ]);
    }

    public function load(array $data)
    {
        $id = $data["id"];
        $category = (new \Models\Category())->load($id);

        return print json_encode([
            "name" => $category->name,
            "description" => $category->description,
            "image_id" => $category->image_id
        ]);
    }

    public function save(array $data)
    {
        $category = (!empty($data['id']) ? (new \Models\Category())->load($data["id"]) : new \Models\Category());
        if ($_FILES["image"]["error"] === 0) {
            if (empty($category->image_id)) {
                $data["image_id"] = (new \Models\Image())->fileSave($_FILES["image"]);
            } else {
                $image = (new \Models\Image())->load($category->image_id);
                $image->fileSave($_FILES["image"]);
            }
        }
        $category->bootstrap($data);
        $category->save();
        return print json_encode($category->message());
    }

    public function delete(array $data)
    {
        $category = (new \Models\Category())->find($data["name"])[0];
        $category->destroy();
        return print json_encode($category->message());
    }
}
