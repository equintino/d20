<?php

namespace Core;

use \PDO;
use \PDOException;
use \Config\Config;

class Connect
{
    public static $data;

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

    public static function getPasswd(string $passwd): ?string
    {
        return Safety::decrypt($passwd);
    }

    final private function __construct()
    {

    }

    final public function __clone()
    {

    }

}
