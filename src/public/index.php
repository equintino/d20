<?php
$dot = "/../";
$path = theme("index.php");
if (file_exists(__DIR__ . "/../Config/.config.ini")) {
    $dbs = array_keys(parse_ini_file(\Core\Connect::getFile(), true));
}

require_once __DIR__ . $dot . $path;
