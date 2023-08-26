<?php
    ini_set("display_errors", 1);
    error_reporting(E_ALL);

    ob_start();

    require_once __DIR__ . "/vendor/autoload.php";

    use CoffeeCode\Router\Router;
    use Core\Session;

    $router = new Router(url(), ":");
    $session = new Session();

    /**  Web Routes */
    $router->namespace("_App");
    $router->get("/", "Web:start");
    $router->post('/login', "Web:_login");
    $router->post('/register', "Web:register");
    $router->post('/enter', "Web:enter");



    if ($session->getUser()) {
        $router->get('/home', 'Web:home');

        /**  The Users' Screens */
        $router->namespace("_App");
        $router->get("/user", "User:init");
        $router->get("/user/add", "User:add");
        $router->post("/user/save", "User:save");
        $router->get("/user/list", "User:list");
        $router->post("/user/edit", "User:edit");
        $router->post("/user/update", "User:update");
        $router->post("/user/delete", "User:delete");
        $router->post("/user/reset", "User:reset");
        $router->post("/user/token", 'User:token');

        /** The Shield's Screens */
        $router->namespace("_App");
        $router->get("/shield", "Shield:init");

        /** The Group's Screens */
        $router->namespace("_App");
        $router->post("/group/{login}", "Group:access");
        $router->post("/group/add", "Group:add");
        $router->post("/group/save", "Group:save");
        $router->post("/group/delete", "Group:delete");
        $router->post("/group/access", "Group:access");
        $router->post("/group/update", "Group:update");

        /** The Characters */
        $router->namespace("_App");
        $router->get("/character", "Character:_init");
        $router->get("/character/add", "Character:add");
        $router->get("/character/list", "Character:list");
        $router->post("/character/save", "Character:save");
        $router->post("/character/update", "Character:update");
        $router->post("/character/edit", "Character:edit");
        $router->post("/character/delete", "Character:delete");
        $router->post("/character/story", "Character:story");

        /** The Player */
        $router->namespace("_App");
        $router->get("/player", "Player:init");
        $router->post("/player/delete", "Player:delete");

        /** The Breed */
        $router->namespace("_App");
        $router->get("/breed", "Breed:init");
        $router->get("/breed/add", "Breed:add");
        $router->get("/breed/list", "Breed:list");
        $router->post("/breed/edit", "Breed:edit");
        $router->post("/breed/save", "Breed:save");
        $router->post("/breed/delete", "Breed:delete");
        $router->post("/breed/id/{id}", "Breed:load");
        $router->post("/breed/list", "Breed:list2");

        /** The Category */
        $router->namespace("_App");
        $router->get("/category", "Category:_init");
        $router->get("/category/add", "Category:add");
        $router->post("/category/save", "Category:save");
        $router->get("/category/list", "Category:list");
        $router->post("/category/edit", "Category:edit");
        $router->post("/category/delete", "Category:delete");
        $router->post("/category/id/{id}", "Category:load");

        /** The Avatar */
        $router->namespace("_App");
        $router->get("/avatar", "Avatar:_init");
        $router->post("/avatar", "Avatar:getAvatars");
        $router->get("/avatar/add", "Avatar:add");
        $router->get("/avatar/list", "Avatar:list");
        $router->post("/avatar/save", "Avatar:save");
        $router->post("/avatar/show", "Avatar:show");
        $router->post("/avatar/edit", "Avatar:edit");
        $router->post("/avatar/delete", "Avatar:delete");

        /** The Mission */
        $router->namespace("_App");
        $router->get("/mission", "Mission:_init");
        $router->get("/mission/add", "Mission:add");
        $router->post("/mission/save", "Mission:save");
        $router->post("/mission/update", "Mission:update");
        $router->post("/mission/delete", "Mission:delete");
        $router->post("/mission/load/{name}", "Mission:load");
        $router->post("/mission/id/{id}", "Mission:loadId");
        $router->post("/mission/personages/{name}", "Mission:personages");
        $router->post("/mission/personages", "Mission:personages");
        $router->post("/mission/edit", "Mission:edit");
        $router->get("/mission/list", "Mission:list");
        $router->post("/map/add", "Mission:_map");
        $router->post("/map/save", "Mission:mapSave");
        $router->post("/map/load", "Mission:mapLoad");
        $router->post("/map/edit", "Mission:mapEdit");
        $router->post("/map/delete", "Mission:mapDelete");

        /** The Mission Request */
        $router->namespace("_App");
        $router->post("/missionRequest/init", "MissionRequest:init");
        $router->post("/missionRequest/request", "MissionRequest:request");
        $router->post("/missionRequest/save", "MissionRequest:save");

        /** Image */
        $router->namespace("_App");
        $router->get("/image/id/{id}", "Image:init");
        $router->post("/image/delete/id/{id}", "Image:delete");
        $router->post("/image/save", "Image:save");
        $router->get("/image/getImage/{file}", "Image:getImage");

        /** Server */
        $router->namespace("_App");
        $router->post("/group", "Group:init");
        $router->post("/user", "User:save");
        $router->get("/carousel", "Avatar:carousel");
        $router->get("/config", "Config:list");
        $router->post("/config/register", "Config:add");
        $router->post("/config/save", "Config:save");
        $router->post("/config/edit", "Config:edit");
        $router->post("/config/update", "Config:update");
        $router->post("/config/delete", "Config:delete");

        /** Logout */
        $router->post("/exit", function () {
            (new Session())->destroy();
        });
    }

    /** Error Routes */
    $router->namespace("_App")->group("/ops");
    $router->get("/{errcode}", "Web:error");

    /** Routes */
    $router->dispatch();

    /**  Error Redirect */
    if ($router->error()) {
        $router->redirect("/ops/{$router->error()}");
    }

    ob_end_flush();
