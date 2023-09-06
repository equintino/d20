<?php

namespace _App;

class Config extends Controller
{
    protected $page = " config";

    // public function __construct()
    // {
    //     parent::__construct();
    // }

    public function init(array $data): string
    {
        $this->class->save($data);
        return print $this->class->message();
    }

    public function list(): void
    {
        $config = $this->class;
        $activeConnection = $this->class->getConfConnection();
        $this->render("config", compact("config","activeConnection"));
    }

    public function add(): void
    {
        $act = "add";
        $types = $this->class->types;
        ($this->setPath("Modals")->render("config", compact("act", "types")));
    }

    public function edit(array $data): void
    {
        $types = $this->class->types;
        $connectionName = $data["connectionName"];
        $config = $this->class;
        $config::$local = $connectionName;

        ($this->setPath("Modals")->render("config", compact("config", "types", "connectionName")));
    }

    public function save(array $data): void
    {
        $this->class->save($data);
        echo json_encode($this->class->message());
    }

    public function update(): void
    {
        $params = $this->getPost($_POST);
        $this->class->update($params);
        echo json_encode($this->class->message());
    }

    public function delete(array $data): void
    {
        $this->class->delete($data["connectionName"]);
        echo json_encode($this->class->message());
    }
}
