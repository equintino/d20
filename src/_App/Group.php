<?php

namespace _App;

use Core\Safety;

class Group extends Controller
{

    public function __construct()
    {
        parent::__construct(new \Models\Group());
    }

    public function init()
    {
        $groups = $this->class->activeAll();
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
        return $this->class->load($id);
    }

    public function list(): void
    {
        $groups = $this->class->activeAll() ?? [];
        $screens = Safety::screens("/pages");
        $group_id = ($this->user()->find($_SESSION["login"]->login)->group_id ?? null);

        $this->render("shield", compact("groups", "screens", "group_id"));
    }

    public function access(array $data): string
    {
        $id = $data["id"];
        return print json_encode(explode(",", $this->class->load($id)->access));
    }

    public function load(array $data): void
    {
        $gp = $this->class;
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
        $group = $this->class;

        $group->bootstrap($params);
        $group->save();
        echo json_encode($group->message());
    }

    public function update(): void
    {
        $access = $_POST['pages'];
        $groupId = $_POST["id"];
        $group = $this->class->load($groupId);
        $group->access = "home,error,{$access}";
        $group->save(true);
        echo json_encode($group->message());
    }

    public function delete(array $data): void
    {
        $id = $data["id"];
        $group = $this->class->load($id);
        $group->destroy();
        echo json_encode($group->message());
    }
}
