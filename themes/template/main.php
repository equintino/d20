<?php
    include __DIR__ . "/../../vendor/autoload.php";
    $login = ($_POST["login"] ?? null);
    $password = ($_POST["password"] ?? null);
    $access = new \Core\Session();
    $users = new \Models\User();
    $user = $users->find($login);

    if(!$user && preg_match("/doesn't exist/", $users->message())) {
        $users->createThisTable();
        return print(json_encode("No data"));
    }

    if (!$user) {
        return print(json_encode("Non-existent"));
    }
    if($user->validate($password, $user->password)) {
        $access->setLogin($login);
        return print(json_encode("1"));
    } else {
        return print(json_encode("Invalid password"));
    }
