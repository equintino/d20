<?php

namespace _App;

class Group extends Controller
{
    public function __construct()
    {
        parent::__construct(new \Models\Group());
    }

    public function init(): string
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

    public function access(array $data): string
    {
        $id = $data["id"];
        return print json_encode(explode(",", $this->class->load($id)->access));
    }

    public function add(): void
    {
        ($this->setPath("Modals")->render("group"));
    }

    public function save(): string
    {
        $params = $this->getPost($_POST);
        $group = $this->class;
        $group->bootstrap($params);
        $group->save();
        return print json_encode($group->message());
    }

    public function delete(array $data): string
    {
        $id = $data["id"];
        $group = $this->class->load($id);
        $group->destroy();
        return print json_encode($group->message());
    }

    public function update(): string
    {
        $access = $_POST['pages'];
        $groupId = $_POST["id"];
        $group = $this->class->load($groupId);
        $group->access = "home,error,{$access}";
        $group->save(true);
        return print json_encode($group->message());
    }

    public function getListGroup()
    {
        return $this->class->activeAll();
    }

    public function getThisGroup(int $id): \Models\Group
    {
        return $this->class->load($id);
    }
}
