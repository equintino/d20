<?php

namespace Support;

class FileTransation
{
    public static $local;
    public static $file;

    public function __construct(string $file = ".env", string $text=null)
    {
        self::$file = __DIR__ . "/../../{$file}";
        $this->setConst($text);
    }

    // public static function getLocal(): ?bool
    // {
    //     return self::$local;
    // }

    public static function setLocal(string $connectionName)
    {
        if (!defined("CONF_CONNECTION")) {
            define("CONF_CONNECTION", $connectionName);
        }
        $handle = fopen(self::$file, "r+b");
        $string = "";
        while ($row = fgets($handle)) {
            if (preg_match("/CONF_CONNECTION/", $row)) {
                $string .= "CONF_CONNECTION=" . $connectionName . "\r\n";
            } else {
                $string .= $row;
            }
        }

        ftruncate($handle, 0);
        rewind($handle);
        self::$local = ( !fwrite($handle, $string) ? false : true );
        fclose($handle);
    }

    public static function saveFile()
    {
        $handle = fopen(__DIR__ . "/../../.env", "r+b");
        $string = "";
        while ($row = fgets($handle)) {
            $parter = key($params);
            if (preg_match("/$parter/", $row)) {
                $string .= $parter . "=" . $params[$parter];
            } else {
                $string .= $row;
            }
        }

        ftruncate($handle, 0);
        rewind($handle);
        if (!fwrite($handle, $string)) {
            die("Could not change the file");
        } else {
            echo json_encode("Successfully changed");
        }
        fclose($handle);
    }

    public static function setConst(string $text=null)
    {
        if (!file_exists(self::$file)) {
            $handle = fopen(self::$file, "w+");
            $text = (!empty($text) ? $text: "CONF_CONNECTION=local\r\nCONF_URL_BASE=initial-default-project\r\nCONF_URL_TEST=test/initial-default-project\r\nCONF_BASE_THEME=layout\r\nCONF_VIEW_THEME=template\r\nCONF_SITE_NAME=Site-Address\r\nCONF_SITE_TITLE=System Name\r\nCONF_SITE_DESC=System Description");

            self::$local = ( !fwrite($handle, $text) ? false : true );
            fclose($handle);
            //header('Refresh:0');
        }
    }

    public static function getConst(): void
    {
        $handle = fopen(self::$file, "r");
        while ($row = fgets($handle)) {
            if (!empty(trim($row))) {
                $params = explode("=", trim(str_replace("\"","", $row)));
                if (!defined($params[0])) {
                    define($params[0], "{$params[1]}");
                }
            }
        }
    }
}
