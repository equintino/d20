<?php

namespace Support;

class AjaxTransaction
{
    private $cleanFields = [ "act", "confPassword", "action" ];
    private $class;
    private $action;
    private $params;
    private $search;
    private $method;

    public function __construct(object $class, array $params)
    {
        $this->setClass($class);
        $this->params = $params;
        $this->action = $params["action"];
    }

    public function loadData()
    {

    }

    public function saveData(): ?string
    {
        (array_key_exists("password", $this->params) ? $this->confPassword(): null);
        $this->cleanFields();
        $this->setSearch();
        $this->setMethodClass();
        $this->setData();

        return $this->run()->message();
    }

    private function cleanFields(): array
    {
        foreach ($this->params as $key => $value) {
            if (in_array($key, $this->cleanFields)) {
                unset($this->params[$key]);
            }
        }
        return $this->params;
    }

    private function confPassword()
    {
        $password = $this->params["password"];
        $confPassword = $this->params["confPassword"];
        if ($password !== $confPassword) {
            print json_encode("<span class='warning'>The password was not confirmed</span>");
            die;
        }
    }

    private function replaceData($class): object
    {
        foreach ($this->params as $key => $value) {
            $class->$key = $value;
        }
        return $class;
    }

    private function getClassName(): string
    {
        $start = strripos(get_class($this->class),"\\");
        $className = get_class($this->class);
        return substr($className, $start + 1);
    }

    private function setSearch(): void
    {
        $className = $this->getClassName();

        switch ($className) {
            case "User":
                $this->params["user"] = &$this->params["login"];
                $this->search = $this->params["login"];
                break;
            default:
                unset($this->params["login"]);
                $this->search = $this->params["name"];
        }
    }

    private function setMethodClass()
    {
        switch ($this->action) {
            case "add": case "change": case "edit": case "reset":
                $this->method = "save";
                break;
            case "delete":
                $this->method = "destroy";
                break;
            default:
                $this->method = null;
        }
    }

    private function getClass(): object
    {
        return $this->class;
    }

    private function setClass(object $class)
    {
        $this->class = $class;
    }

    private function setData()
    {
        switch ($this->action) {
            case "add":
                $data = $this->class->bootstrap($this->params);
                $this->class = $data;
                break;
            case "change":/** token */
                $data = $this->class->find($this->search);
                $data->password = $this->class->crypt($this->params["password"]);
                $data->token = null;
                $this->class = $data;
                break;
            case "edit":
                $data = $this->class->find($this->search);
                $data = $this->replaceData($data);
                $this->class = $data;
                break;
            case "reset":/** token */
                $data = $this->class->find($this->search);
                $data->token();
                $this->class = $data;
                break;
            case "delete":
                $data = $this->class->find($this->search);
                $this->class = $data;
                break;
            default:
        }
    }

    private function run(): object
    {
        $methodClass = $this->method;
        $this->class->$methodClass();
        return $this;
    }

    public function message()
    {
        return json_encode($this->class->message(),
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
