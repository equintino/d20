<?php

namespace _App;

use Traits\GroupTrait;
use Models\User;
use Core\Safety;
use Core\Session;

class Group extends Controller
{
    use GroupTrait;

    public function init()
    {
        $groups = (new \Models\Group())->activeAll();
        foreach ($groups as $group) {
            $list[$group->name] = [
                'id' => $group->id,
                'name' => $group->name,
                'access' => $group->access
            ];
        }
        return print(json_encode($list));
    }

    public function list(): void
    {
        $groups = $this->group()->all() ?? [];
        $screens = Safety::screens("/pages");
        $group_id = ((new User())->find($_SESSION["login"]->login)->group_id ?? null);

        $this->view->render("shield", [ compact("groups", "screens", "group_id") ]);
    }

    public function access(array $data): string
    {
        // $groupId = $data["groupId"];
        $id = $data["id"];
        return print json_encode(explode(",", (new \Models\Group())->load($id)->access));
    }

    public function load(array $data): void
    {
        $group = $this->group()->find($data["groupName"]);
        if ($group) {
            $security["access"] = [];
            foreach (explode(",", $group->access) as $screen) {
                array_push($security["access"], Safety::renameScreen($screen));
            }
            echo json_encode($security);
        }
    }

    public function add(): void
    {
        ($this->view->setPath("Modals")->render("group"));
    }

    public function save(): void
    {
        $params = $this->getPost($_POST);
        $group = $this->group();

        $group->bootstrap($params);
        $group->save();
        echo json_encode($group->message());
    }

    public function update(): void
    {
        // $pages = $_POST["pages"];
        // $groupId = $_POST["groupId"];
        $access = $_POST['pages'];
        $groupId = $_POST["id"];
        $group = (new \Models\Group())->load($groupId);
        // $access = implode(",", $pages);
        $group->access = "home,error,{$access}";
        $group->save(true);
        echo json_encode($group->message());
    }

    public function delete(array $data): void
    {
        // $id = $data["groupId"];
        $id = $data["id"];
        $group = $this->group()->load($id);
        $group->destroy();
        echo json_encode($group->message());
    }
}
