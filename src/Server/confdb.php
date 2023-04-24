<?php

$connectionName = $_POST['connectionName'];
unset($_POST['connectionName']);
$data[$connectionName] = $_POST;

$file = __DIR__ . '/../Config/.config.json';
$handle = fopen($file, "r+b");
$str = '';
while ($row = fgets($handle)) {
    $str .= $row;
}
$str = json_decode($str);

$obj = new StdClass();
$obj->dsn = "{$_POST['type']}:Server={$_POST['address']};Database={$_POST['db']}";
$obj->user = $_POST['user'];
$obj->passwd = base64_encode($_POST['passwd']);

$str->$connectionName = $obj;
$str = json_encode($str);

ftruncate($handle, 0);
rewind($handle);
if (!fwrite($handle, $str)) {
    fclose($handle);
    return print(json_encode('Error!!!'));
}
fclose($handle);

return print(true);
