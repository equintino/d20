<?php

namespace _App;

class Config extends Controller
{
    protected $page = " config";

    public function __construct()
    {
        parent::__construct(new \Config\Config());
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
        $this->class::$local = $connectionName;
        $config = $this->class;
        $address = $this->class->address();
        $database = $this->class->database();
        $user = $this->class->user();
        $this->setPath("Modals")->render("config", compact(
            "config", "types", "connectionName", "address", "database", "user"
        ));
    }

    public function save(array $data): string
    {
        $this->class->save($data);
        return print json_encode($this->class->message());
    }

    public function update(): string
    {
        $params = $this->getPost($_POST);
        $this->class->update($params);
        return print json_encode($this->class->message());
    }

    public function delete(array $data): string
    {
        $this->class->delete($data["connectionName"]);
        return print json_encode($this->class->message());
    }
}
