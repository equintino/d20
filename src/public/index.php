<?php
$dot = "/../";
$path = theme("index.php");
// if (file_exists(__DIR__ . "/../Config/.config.ini")) {
//     $dbs = array_keys(parse_ini_file(\Core\Connect::getFile(), true));
// }

// var_dump(
//     url(),
//     __DIR__ . $dot . $path
// );
require_once __DIR__ . $dot . $path;
// require_once __DIR__ . url() . $dot . $path;
