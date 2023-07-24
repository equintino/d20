<?php
    include __DIR__ . "/../../vendor/autoload.php";

    use Core\Login;

    $login = $_GET['login'];
    $password = $_GET['password'];
    $db = $_GET['db'];

    return print json_encode((new Login($login, $password, $db))->user()->validate());
