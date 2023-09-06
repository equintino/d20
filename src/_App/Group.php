<?php

namespace _App;

class Group extends Controller
{
    private \Models\Group $_group;

    public function __construct()
    {
        parent::__construct(new \Models\Group());
        $this->_group = new \Models\Group();
    }

    public function init(): string
    {
        $groups = $this->_group->activeAll();
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
        return print json_encode(explode(",", $this->_group->load($id)->access));
    }

    public function add(): void
    {
        ($this->setPath("Modals")->render("group"));
    }

    public function save(): string
    {
        $params = $this->getPost($_POST);
        $group = $this->_group;

        $group->bootstrap($params);
        $group->save();
        return print json_encode($group->message());
    }

    public function delete(array $data): string
    {
        $id = $data["id"];
        $group = $this->_group->load($id);
        $group->destroy();
        return print json_encode($group->message());
    }

    public function update(): string
    {
        $access = $_POST['pages'];
        $groupId = $_POST["id"];
        $group = $this->_group->load($groupId);
        $group->access = "home,error,{$access}";
        $group->save(true);
        return print json_encode($group->message());
    }

    public function getListGroup()
    {
        return $this->_group->activeAll();
    }

    public function getThisGroup(int $id): \Models\Group
    {
        return $this->_group->load($id);
    }
}
