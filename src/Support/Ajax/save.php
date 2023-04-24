<?php

require_once __DIR__ . "/../../../vendor/autoload.php";

$params = (getPost($_POST));
if ($params["act"] === "login") {
    $class = new Models\User();
    echo (new Support\AjaxTransaction($class, $params))->saveData();
} elseif ($params["act"] === "connection") {
    $config = new \Config\Config();
    $config->save($params);
    echo json_encode($config->message());
} elseif ($params["act"] === "token") {
    $user = (new Models\User())->find(["login" => $params["login"]]);
    $password = $params["password"];
    $user[0]->setPasswd($password);
    $user[0]->token = null;
    $user[0]->save();
    echo json_encode($user[0]->message());
}
