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
        $breeds = (new \Models\Breed())->activeAll();
        $categories = (new \Models\Category())->activeAll();
        $this->view->render($this->page, compact("act", "avatars", "breeds", "categories"));
    }

    public function getAvatars(array $data): string
    {
        $search = [
            "breed_id" => $data["breed_id"],
            "category_id" => $data["category_id"]
        ];
        $avatars = (new \Models\Avatar())->search($search);
        foreach($avatars as $avatar) {
            $response[] = [
                "id" => $avatar->id,
                "image_id" => $avatar->image_id,
                "category_id" => $data["category_id"]
            ];
        }
        return print(json_encode($response ?? "This breed has no definite image"));
    }

    public function edit(array $data): void
    {
        $id = $data["id"];
        $act = "edit";
        $breeds = (new \Models\Breed())->activeAll();
        $categories = (new \Models\Category())->activeAll();
        $avatar = (new \Models\Avatar())->load($id);
        echo "<script>var act='edit'</script>";
        $this->view->setPath("Modals")->render($this->page, compact("act", "avatar", "breeds", "categories"));
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
        $category_id = $list[0]["category_id"];
        $act = "list";
        $categories = (new \Models\Category())->activeAll();
        echo "<script>var act='{$act}'</script>";
        $this->view->setPath("Modals")->render($this->page, compact("list", "act", "categories","category_id"));
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
        $avatars = (!empty($data["id"]) ? (new \Models\Avatar())->load($data["id"]) : new \Models\Avatar());
        $files = $_FILES["image"];
        if(is_array($files["name"])) {
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
        } else {
            if($files["error"] === 0) {
                $image = (new \Models\Image())->load($avatars->image_id);
                $data["image_id"] = $image->fileSave($files);
            }
            $avatars->bootstrap($data);
            $avatars->save();
        }
        return print(json_encode($avatars->message()));
    }

    public function delete(array $data)
    {
        $avatar = (new \Models\Avatar())->load($data["id"]);
        $image = (new \Models\Image())->load($avatar->image_id);
        $image->destroy();
        return print(json_encode($avatar->destroy()));
    }
}
