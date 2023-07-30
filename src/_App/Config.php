<?php

namespace _App;

use Core\Connect;

class Config extends Controller
{
    protected $page = " config";
    private $config;

    public function __construct()
    {
        parent::__construct();
        $this->config = new \Config\Config();
    }

    public function init(array $data): string
    {
        $this->config->save($data);
        return print $this->config->message();
    }

    public function list(): void
    {
        $config = $this->config;
        // $activeConnection = Connect::getConfConnection();
        $activeConnection = $this->config->getConfConnection();
        $this->render("config", [ compact("config","activeConnection") ]);
        // $this->view->render("config", [ compact("config") ]);
    }

    public function add(): void
    {
        $act = "add";
        $types = $this->config->types;
        ($this->setPath("Modals")->render("config", [ compact("act", "types") ]));
    }

    public function edit(array $data): void
    {
        $types = $this->config->types;
        $connectionName = $data["connectionName"];
        $config = $this->config;
        $config::$local = $connectionName;

        ($this->view->setPath("Modals")->render("config", [ compact("config", "types", "connectionName") ]));
    }

    public function save(array $data): void
    {
        // $params = $this->getPost($_POST);
        // $data = $params["data"];
        // var_dump(
        //     // $params,
        //     $data
        // );die;
        $this->config->save($data);
        echo json_encode($this->config->message());
    }

    public function update(): void
    {
        $params = $this->getPost($_POST);
        $this->config->update($params);
        echo json_encode($this->config->message());
    }

    public function delete(array $data): void
    {
        $this->config->delete($data["connectionName"]);
        echo json_encode($this->config->message());
    }
}
