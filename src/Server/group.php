<?php

foreach ((new Models\Group())->activeAll() as $value) {
    if (!empty($value->name)) {
        $groups[$value->name] = [
            "id" => $value->id,
            "access" => $value->access
        ];
    }
}
return print(json_encode($groups));
