<?php

namespace _App;

class Category extends Controller
{
    protected $page = "category";

    public function __construct()
    {
        parent::__construct(new \Models\Category());
    }

    public function add(): void
    {
        $act = "add";
        $this->render($this->page, compact("act"));
    }

    public function list(): void
    {
        $act = "list";
        $categories = $this->class->activeAll();
        $this->render($this->page, compact("act", "categories"));
    }

    public function edit(array $data): void
    {
        $id = $data["id"];
        $category = $this->class->load($id);
        $this->setPath("Modals")->render($this->page, compact("category"));
    }

    public function load(array $data)
    {
        $id = $data["id"];
        $category = $this->class->load($id);

        return print json_encode([
            "name" => $category->name,
            "description" => $category->description,
            "image_id" => $category->image_id
        ]);
    }

    public function save(array $data)
    {
        $category = (!empty($data['id']) ? $this->class->load($data["id"]) : $this->class);
        if ($_FILES["image"]["error"] === 0) {
            if (empty($category->image_id)) {
                $data["image_id"] = $this->image()->fileSave($_FILES["image"]);
            } else {
                $image = $this->image()->load($category->image_id);
                $image->fileSave($_FILES["image"]);
            }
        }
        $category->bootstrap($data);
        $category->save();
        return print json_encode($category->message());
    }

    public function delete(array $data)
    {
        $category = $this->class->find($data["name"])[0];
        $category->destroy();
        return print json_encode($category->message());
    }
}
