<?php

namespace _App;

class Avatar extends Controller
{
    protected $page = "avatar";

    // public function _init(?array $data): void
    // {
    //     $this->render($this->page);
    // }

    public function carousel(): void
    {
        $this->render('carousel');
    }

    public function add(): void
    {
        $act = "add";
        $breeds = (new \Models\Breed())->activeAll();
        $categories = (new \Models\Category())->activeAll();
        $this->render($this->page,  compact("act", "breeds", "categories"));
    }

    public function list(): void
    {
        $act = "list";
        $avatars = (new \Models\Avatar())->activeAll();
        $breeds = (new \Models\Breed())->activeAll();
        $categories = (new \Models\Category())->activeAll();
        $this->render($this->page, compact("act", "avatars", "breeds", "categories"));
    }

    public function getAvatars(array $data): string
    {
        $search = [
            "breed_id" => $data["breed_id"],
            "category_id" => $data["category_id"]
        ];
        $avatars = (new \Models\Avatar())->search($search);
        foreach ($avatars as $avatar) {
            $response[] = [
                "id" => $avatar->id,
                "image_id" => $avatar->image_id,
                "category_id" => $data["category_id"]
            ];
        }
        return print json_encode($response ?? "This breed has no definite image");
    }

    public function edit(array $data): void
    {
        $id = ( $data["id"] ?? null );
        $act = "edit";
        $breeds = (new \Models\Breed())->activeAll();
        $categories = (new \Models\Category())->activeAll();
        $avatar = (new \Models\Avatar())->load($id);
        echo "<script>var act='edit'</script>";
        $this->setPath("Modals")->render($this->page, compact("act", "avatar", "breeds", "categories"));
    }

    public function show(array $data): void
    {
        $list = null;
        $idCategory = $data["category_id"];
        $idBreed = $data["breed_id"];
        $act = (!empty($data["act"]) ? ".{$data['act']}" : null);
        $source = ($data["source"] ?? null);
        $currentCat = "";
        $categories = (new \Models\Category())->activeAll();
        $breeds = (new \Models\Breed())->activeAll();
        foreach ($categories as $category) {
            if ($category->id == $idCategory) {
                $currentCat = $category;
                break;
            }
        }
        $this->setPath("Modals")->render($this->page . $act,
                compact("list", "act", "categories", "idCategory", "idBreed", "currentCat", "source", "breeds")
        );
    }

    public function save(array $data)
    {
        $avatars = (
            !empty($data["id"]) ? (new \Models\Avatar())->load($data["id"]) : new \Models\Avatar()
        );
        $files = $_FILES["image"];
        if (is_array($files["name"])) {
            for ($x = 0; $x < count($files["name"]); $x++) {
                $file["name"] = $files["name"][$x];
                $file["type"] = $files["type"][$x];
                $file["tmp_name"] = $files["tmp_name"][$x];
                $file["size"] = $files["size"][$x];
                if ($files["error"][$x] === 0) {
                    $data["image_id"] = (new \Models\Image())->fileSave($file);
                }
                $avatars->bootstrap($data);
                $avatars->save();
            }
        } else {
            if ($files["error"] === 0) {
                $image = (new \Models\Image())->load($avatars->image_id);
                $data["image_id"] = $image->fileSave($files);
            }
            $avatars->bootstrap($data);
            $avatars->save();
        }
        return print json_encode($avatars->message());
    }

    public function delete(array $data): ?string
    {
        $avatar = (new \Models\Avatar())->load($data["id"]);
        $image = (new \Models\Image())->load($avatar->image_id);
        $image->destroy();
        $avatar->destroy();
        return print json_encode($avatar->message());
    }
}
