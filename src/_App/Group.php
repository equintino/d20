<?php

namespace _App;

use Models\User;
use Core\Safety;

class Group extends Controller
{
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
        return print json_encode($list);
    }

    public function getThisGroup(int $id)
    {
        return (new \Models\Group())->load($id);
    }

    // public function getGroup(): array
    // {
    //     return (new \Models\Group())->activeAll();
    // }

    public function list(): void
    {
        $groups = (new \Models\Group())->activeAll() ?? [];
        $screens = Safety::screens("/pages");
        $group_id = ((new User())->find($_SESSION["login"]->login)->group_id ?? null);

        $this->render("shield", compact("groups", "screens", "group_id"));
    }

    public function access(array $data): string
    {
        $id = $data["id"];
        return print json_encode(explode(",", (new \Models\Group())->load($id)->access));
    }

    public function load(array $data): void
    {
        $gp = new \Models\Group();
        $group = $gp->find($data["groupName"]);
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
        ($this->setPath("Modals")->render("group"));
    }

    public function save(): void
    {
        $params = $this->getPost($_POST);
        $group = new \Models\Group();

        $group->bootstrap($params);
        $group->save();
        echo json_encode($group->message());
    }

    public function update(): void
    {
        $access = $_POST['pages'];
        $groupId = $_POST["id"];
        $group = (new \Models\Group())->load($groupId);
        $group->access = "home,error,{$access}";
        $group->save(true);
        echo json_encode($group->message());
    }

    public function delete(array $data): void
    {
        $id = $data["id"];
        $group = (new \Models\Group())->load($id);
        $group->destroy();
        echo json_encode($group->message());
    }
}
