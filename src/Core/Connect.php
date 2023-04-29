<?php

namespace Core;

use \PDO;
use \PDOException;
use \Config\Config;

class Connect
{
    public static $data;
    // private static $file;

    private const OPTIONS = [
        //PDO::SQLSRV_ATTR_ENCODING => PDO::SQLSRV_ENCODING_UTF8,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static $instance;

    /**
     * return PDO
     */
    public static function getInstance(bool $msgDb = false): ?PDO
    {
        // $config = self::getData();
        $config = Config::getConfig();
        if (empty($config)) {
            (new Session())->destroy();
            die("Need to clean the browser cache");
        }
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    $config->dsn,
                    $config->user,
                    self::getPasswd($config->passwd),
                    self::OPTIONS
                );
            } catch (\PDOException $exception) {
                (new Session())->destroy();
                if ($msgDb) {
                    die("<i style='font-size: .7em'>" . $exception->getMessage() . "</i>)");
                }
                die("<div>Whoops, There was a mistake when connecting with the bank!</div>");
            }
        }
        return self::$instance;
    }

    // public static function getConfConnection(): ?string
    // {
    //     if (!empty($_SESSION["login"])) {
    //         return $_SESSION["login"]->db;
    //     }
    //     return CONF_CONNECTION;
    // }

    public static function getPasswd(string $passwd): ?string
    {
        return Safety::decrypt($passwd);
    }

    // public static function getData(): ?array
    // {
    //     if (self::$data !== null) {
    //         return (array) self::$data[self::getConfConnection()];
    //     }

    //     if (empty(self::getFile())) {
    //         return null;
    //     }

    //     // self::$data = parse_ini_file(self::getFile(), true);
    //     // return (
    //     //     !empty(self::$data[self::getConfConnection()]) ?
    //     //         self::$data[self::getConfConnection()] : null
    //     // );

    //     self::$data = self::getFile();
    //     return ((array) self::$data[self::getConfConnection()] ?? null);
    // }

    // public static function getFile()
    // {
    //     // if (file_exists(__DIR__ . "/../Config/.config.ini")) {
    //     //     return self::$file = __DIR__ . "/../Config/.config.ini";
    //     // }
    //     if (file_exists(__DIR__ . "/../Config/.config.json")) {
    //         return self::$file = (array) json_decode(file_get_contents(__DIR__ . "/../Config/.config.json"));
    //     }
    //     return null;
    // }

    final private function __construct()
    {

    }

    final public function __clone()
    {

    }

}
