<?php

namespace Config;

// use Core\Connect;
use Traits\CryptoTrait;

class Config
{
    use CryptoTrait;

    private $data;
    private $dsn;
    private $user;
    private $passwd;
    public readonly string $file;
    public static object $dataFile;
    public static string $local;
    public $message;
    public $types = [ "mysql", "sqlsrv" ];

    public function __construct()
    {
        $this->file = ".config.json";
        if (file_exists(__DIR__ . "/" . $this->file)) {
            // $this->dataFile = parse_ini_file(__DIR__ . "/" . $file, true);
            self::$dataFile = json_decode(file_get_contents(__DIR__ . "/" . $this->file));
        }
        self::$local = $this->getConfConnection();
    }

    public static function getConfig()
    {
        return self::$dataFile->{self::$local};
    }

    /** contant file env */
    public function getConfConnection(): ?string
    {
        // return Connect::getConfConnection();

        if (!empty($_SESSION["login"])) {
            return $_SESSION["login"]->db;
        }
        return CONF_CONNECTION;
    }

    public function setConfConnection(array $data, string $connectionName = null)
    {
        self::$local = (!empty($connectionName) ? $connectionName : $data["connectionName"]);
        $this->data = $data;
        $this->setType($this->data["type"]);
        $this->setAddress($this->data["address"]);
        $this->setDatabase($this->data["db"]);
        $this->setUser($this->data["user"]);
        if (!empty($this->data["passwd"])) {
            $this->setPasswd($this->data["passwd"]);
        }
    }

    public function type(): ?string
    {
        return (
            !empty(self::$dataFile->{self::$local}) ?
                strstr(self::$dataFile->{self::$local}->dsn, ":", true)
                : null
        );
    }

    private function setType(string $type)
    {
        $dsn = "";
        switch ($type) {
            case "sqlsrv":
                $dsn .= "sqlsrv:Server=";
                break;
            case "mysql":
                $dsn .= "mysql:host=";
        }
        $this->dsn = $dsn;
    }

    public function address(): ?string
    {
        return substr(strstr(strstr($this->file[self::$local]["dsn"], "="), ";", true),1);
    }

    private function setAddress(string $address)
    {
        $this->dsn .= "{$address};";
    }

    public function database(): ?string
    {
        return substr(strrchr($this->file[self::$local]["dsn"], "="), 1);
    }

    private function setDatabase(string $database)
    {
        if ($this->data["type"] === "sqlsrv") {
            $name = "Database";
        } elseif ($this->data["type"] === "mysql") {
            $name = "dbname";
        }
        $this->dsn .= "{$name}={$database}";
    }

    public function getDsn(): ?string
    {
        return $this->dsn;
    }

    public function user(): ?string
    {
        return $this->file[self::$local]["user"];
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    private function setUser(string $user)
    {
        $this->user = $user;
    }

    public function passwd(): ?string
    {
        return $this->decrypt($this->file[self::$local]["passwd"]);
    }

    public function getPasswd(): ?string
    {
        return $this->passwd;
    }

    private function setPasswd(string $passwd)
    {
        $this->passwd = (!empty($passwd) ? base64_encode($passwd) : null);
    }

    private function decrypt(?string $passwd): ?string
    {
        return base64_decode($passwd);
    }

    public function confirmSave(): bool
    {
        if (array_key_exists(self::$local, $this->file)) {
            $this->message = "<span class=warning >The connection name already exists</span>";
            return false;
        } else {
            return $this->save();
        }
    }

    public function save(array $data): bool
    {
        $file = self::$dataFile;
        $this->setConfConnection($data);
        $connectionName = $data["connectionName"];

        $file[$connectionName] = [
            "dsn" => $this->getDsn(),
            "user" => $this->getUser(),
            "passwd" => $this->getPasswd()
        ];

        $saved = $this->saveFile($file);
        $this->message = ($saved ? "<span class='success'>Data saved successfully</span>"
            : "<span class='danger'>Erro ao salvar</span>");
        return $saved;
    }

    public function update(array $data): bool
    {
        $file = (object) $this->getFile();
        $this->setConfConnection($data["data"]);
        parse_str($data["data"], $data);
        $connectionName = $data["connectionName"];

        $file->$connectionName = [
            "dsn" => $this->getDsn(),
            "user" => $this->getUser(),
            "passwd" => $file->$connectionName["passwd"]
        ];

        $saved = $this->saveFile((array) $file);

        $this->message = (
            $saved ? "<span class='success'>Data saved successfully</span>"
                : "<span class='error'>Erro ao salvar</span>"
        );
        return $saved;
    }

    public function delete(string $connectionName): ?bool
    {
        unset($this->file[$connectionName]);
        if ($this->saveFile($this->file)) {
            $this->message = "<span class='success'>Excluded data successfully</span>";
            return true;
        } else {
            $this->message = "<span class='warnig'>Could not delete data</span>";
            return false;
        }
    }

    private function saveFile(array $data): bool
    {
        // $file = __DIR__ . "/../Config/.config.ini";
        $file = __DIR__ . "/../Config/.config.json";
        /** saving file */
        if (file_exists($file)) {
            $handle = fopen($file, "r+");
        } else {
            $handle = fopen($file, "w");
        }
        ftruncate($handle, 0);
        rewind($handle);

        /** replace data */
        // $string = "";
        // foreach ($data as $local => $params) {
        //     $string .= "[{$local}]\r\n";
        //     foreach ($params as $param => $value) {
        //         $string .= "{$param}='{$value}'\r\n";
        //     }
        // }

        // $resp = fwrite($handle, $string);
        $resp = fwrite($handle, json_encode($data));
        fclose($handle);
        return ($resp);
    }

    // public static function getData(): ?object
    // {

    //     if ($this->dataFile !== null) {
    //         return $this->dataFile->{$this->local};
    //     }

    //     if (empty(self::getFile())) {
    //         return null;
    //     }

    //     // self::$data = parse_ini_file(self::getFile(), true);
    //     // return (
    //     //     !empty(self::$data[self::getConfConnection()]) ?
    //     //         self::$data[self::getConfConnection()] : null
    //     // );

    //     $this->dataFile = self::getFile();
    //     return ($this->dataFile->{$this->local} ?? null);
    // }

    // public static function getFile(): ?object
    // {
    //     // if (file_exists(__DIR__ . "/../Config/.config.ini")) {
    //     //     return self::$file = __DIR__ . "/../Config/.config.ini";
    //     // }
    //     if (file_exists(__DIR__ . "/../Config/.config.json")) {
    //         return $this->file = json_decode(file_get_contents(__DIR__ . "/../Config/.config.json"));
    //     }
    //     return null;
    // }

    public function message(): ?string
    {
        return $this->message;
    }
}
