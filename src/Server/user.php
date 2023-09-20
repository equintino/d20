<?php

use _App\User;

$user = new User();
$data = $_POST;

if ($data['act'] === 'update') {
    return print $user->update($data);
}

return print $user->save($data);
