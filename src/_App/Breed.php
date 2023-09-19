<?php

namespace _App;

class Breed extends Controller
{
    protected $page = "breed";

    public function __construct()
    {
        parent::__construct(new \Models\Breed());
        $this->image = new Image();
    }

    public function init(?array $data): void
    {
        $this->render($this->page);
    }

    public function add(): void
    {
        $act = "add";
        $this->render($this->page, compact("act"));
    }

    public function getBreeds()
    {
        return $this->class->activeAll();
    }

    public function list(): void
    {
        $act = "list";
        $breeds = $this->class->activeAll();
        $this->render($this->page, compact("act", "breeds"));
    }

    public function list2(): string
    {
        $breeds = $this->class->activeAll();
        foreach ($breeds as $breed) {
            $list[] = [
                'id' => $breed->id,
                'name' => $breed->name,
                'description' => $breed->description,
                'image_id' => $breed->image_id
            ];
        }
        return print json_encode($list);
    }

    public function edit(array $data): void
    {
        $id = $data["id"];
        $breed = $this->class->load($id);
        $this->setPath("Modals")->render($this->page, compact("breed"));
    }

    public function load(array $data)
    {
        $id = $data["id"];
        $breed = $this->class->load($id);

        return print json_encode([
            "name" => $breed->name,
            "description" => $breed->description,
            "image_id" => $breed->image_id
        ]);
    }

    public function showImage(array $data): void
    {
        $id = $data["id"];
        $breed = $this->class->load($id);
        $type = $breed->type;
        header("Content-Type: {$type}");
        echo $breed->image;
    }

    public function save(array $data)
    {
        $breed = (!empty($data['id']) ? $this->class->load($data["id"]) : $this->class);
        if ($_FILES["image"]["error"] === 0) {
            if (empty($breed->image_id)) {
                $data["image_id"] = $this->image->fileSave($_FILES["image"]);
            } else {
                $image = $this->image->load($breed->image_id);
                $image->fileSave($_FILES["image"]);
            }
        }
        $breed->bootstrap($data);
        $breed->save();
        return print json_encode($breed->message());
    }

    public function delete(array $data)
    {
        $breed = $this->class->find($data["name"])[0];
        return print json_encode($breed->destroy());
    }
}
