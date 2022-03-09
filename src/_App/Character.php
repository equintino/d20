<?php

namespace _App;

use Models\Photo;

class Character extends Controller
{
    protected $page = "character";

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
        $login = $_SESSION["login"];
        $breeds = (new \Models\Breed())->activeAll();
        $classes = (new \Models\Category())->activeAll();
        $this->view->render($this->page, compact("act", "login", "breeds", "classes"));
    }

    public function edit(array $data)
    {
        $act = "edit";
        $login = $_SESSION["login"];
        $id = $data["id"];
        $breed_id = $data["breed_id"];
        $category_id = $data["category_id"];
        $character = (new \Models\Character())->load($id);
        $breed = (new \Models\Breed())->load($breed_id);
        $category = (new \Models\Category())->load($category_id);
        $this->view->setPath("Modals")->render($this->page, compact("act","login","character","breed","category"));
    }

    public function list()
    {
        $act = "list";
        $characters = ((new \Models\Character())->activeAll() ?? []);
        // foreach($characters as $character) {
        //     $list[] = $member->name;
        // }
        // return print(json_encode($list));
        $this->view->render($this->page, compact("act","characters"));
    }

    public function save(array $data)
    {
        $characters = new \Models\Character();
        if(empty($characters->find($data["personage"]))) {
            $characters->bootstrap($data);
        } else {
            return print(json_encode("This personage already exists"));
        }
        $characters->save();
        return print(json_encode($characters->message()));
    }

    public function story(array $data): void
    {
        $this->view->setPath("Modals")->render($this->page);
    }

    public function delete(array $data)
    {
        $id = $data["id"];
        $character = (new \Models\Character())->load($id);
        $character->destroy();
        return print(json_encode($character->message()));
    }

    // public function show()
    // {
    //     $list = $this->list();
    //     if(!is_array($list) &&  preg_match("/doesn't exist/", $list)) {
    //         if((new \Models\Membership())->createThisTable()) {
    //             alertLatch("Created new table, try again");
    //         }
    //     } else {
    //         $this->view->setPath("Modals")->render("membership", [ compact("list") ]);
    //     }
    // }

    // public function update(array $data): ?string
    // {
    //     $membership = new \Models\Membership();
    //     if(!empty($_FILES["file"])) {
    //         $id = (empty($data["photo_id"]) ? 0 : $data["photo_id"]);
    //         $photo_id = $this->updatePhoto($id);
    //         if(!empty($photo_id) && is_numeric($photo_id)) {
    //             $data["photo_id"] = $photo_id;
    //         } else {
    //             alertLatch("Could not save the photo", "var(--car-danger)");
    //             return null;
    //         }
    //     }
    //     if(!empty($_FILES) && $_FILES["certificate"]["error"] === 0) {
    //         $id = (!empty($data["certificate_id"]) ? $data["certificate_id"] : null);
    //         $certificate_id = $this->updateCertificate($id);
    //         if(!empty($certificate_id) && is_numeric($certificate_id)) {
    //             $data["certificate_id"] = $certificate_id;
    //         } else {
    //             alertLatch("Could not save the certificate", "var(--car-danger)");
    //             return null;
    //         }
    //     } else {
    //         unset($data["certificate_id"]);
    //     }
    //     unset($data["file"]);
    //     $membership->bootstrap($this->validate($data));
    //     $membership->save();
    //     return print(json_encode($membership->message()));
    // }

    // public function validate(array $data)
    // {
    //     $field = [
    //         "photo_id" => 0,
    //         "birth_date" => null,
    //         "wedding" => null,
    //         "baptism" => null,
    //         "entrance" => null
    //     ];
    //     foreach($data as $k => $v) {
    //         if(array_key_exists($k, $field) && $v === "") {
    //             $data[$k] = $field[$k];
    //         }
    //     }
    //     return $data;
    // }

    // private function updatePhoto(int $photo_id)
    // {
    //     $photo = new Photo();
    //     return $photo->fileSave($_FILES["file"], $photo_id);
    // }

    // private function updateCertificate(?int $certificate_id)
    // {
    //     return $this->certificate->fileSave($_FILES["certificate"], $certificate_id);
    // }

    // private function newRegister(): int
    // {
    //     $membershipDb = (new \Models\Membership())->all(0,0,"id,register","register desc");
    //     $membership = ($membershipDb ? $membershipDb[0]->register : 0);
    //     return date("Y") . str_pad(substr($membership,4)+1, "3", "0", STR_PAD_LEFT);
    // }
}
