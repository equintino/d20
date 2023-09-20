<?php

foreach ($_POST as $key => $value) {
    $$key = $value;
}

return print (new \Core\Login($login, $password, $db))->user()->validate();
