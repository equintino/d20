<?php
    ob_start();

    require __DIR__ . "/vendor/autoload.php";

    use CoffeeCode\Router\Router;
    use Core\Session;
    use _App\Web;

    $session = new Session();
    $router = new Router(url(), ":");

    if(!empty($_SESSION["login"])) {
        /**  Web Routes */
        $router->namespace("_App");
        $router->get("/home", "Web:home");
        $router->get("/", "Web:init");


        /** Login */
        // $router->namespace("_App");
        // $router->post("/login/enter_", "User:init");


        /**  The Users' Screens */
        $router->namespace("_App");
        // $router->get("/user", "User:init");
        // $router->get("/user/{user}", "User:edit");
        // $router->post("/user/update", "User:update");
        // $router->post("/user/delete/{user}", "User:delete");
        // $router->post("/user/password/reset", "User:reset");
        $router->get("/user/register", "User:add");
        $router->post("/user/save", "User:save");
        // $router->get("/user/list/company/{companyId}", "User:list");


        /** The Characters */
        $router->namespace("_App");
        $router->get("/character", "Character:init");
        $router->get("/character/add", "Character:add");
        $router->get("/character/list", "Character:list");
        $router->post("/character/save", "Character:save");
        $router->post("/character/edit", "Character:edit");
        $router->post("/character/delete", "Character:delete");


        /** The Breed */
        $router->namespace("_App");
        $router->get("/breed", "Breed:init");
        $router->get("/breed/add", "Breed:add");
        $router->get("/breed/list", "Breed:list");
        $router->post("/breed/edit", "Breed:edit");
        $router->post("/breed/save", "Breed:save");
        $router->post("/breed/delete", "Breed:delete");
        $router->post("/breed/id/{id}", "Breed:load");


        /** The Category */
        $router->namespace("_App");
        $router->get("/category", "Category:init");
        $router->get("/category/add", "Category:add");
        $router->post("/category/save", "Category:save");
        $router->get("/category/list", "Category:list");
        $router->post("/category/edit", "Category:edit");
        $router->post("/category/delete", "Category:delete");
        $router->post("/category/id/{id}", "Category:load");
        $router->get("/character/story", "Character:story");


        /** The Avatar */
        $router->namespace("_App");
        $router->get("/avatar", "Avatar:init");
        $router->post("/avatar", "Avatar:getAvatars");
        $router->get("/avatar/add", "Avatar:add");
        $router->get("/avatar/list", "Avatar:list");
        $router->post("/avatar/save", "Avatar:save");
        $router->post("/avatar/show", "Avatar:show");
        $router->post("/avatar/edit", "Avatar:edit");
        $router->post("/avatar/delete", "Avatar:delete");



        /** The Mission */
        $router->namespace("_App");
        $router->get("/mission", "Mission:init");
        $router->get("/mission/add", "Mission:add");
        $router->post("/mission/save", "Mission:save");
        $router->post("/mission/update", "Mission:update");
        $router->post("/mission/delete", "Mission:delete");
        $router->post("/mission/load/{name}", "Mission:load");
        $router->get("/mission/edit/{id}", "Mission:edit");
        $router->get("/mission/list", "Mission:list");
        $router->post("/map/add", "Mission:map");
        $router->post("/map/save", "Mission:mapSave");
        $router->post("/map/load", "Mission:mapLoad");
        $router->post("/map/edit", "Mission:mapEdit");


        /** The Maps */
        // $router->namespace("_App");
        // $router->get("/map/add", "Map:add");


        /** The Groups' Screens */
        // $router->namespace("_App");
        // $router->get("/shield", "Group:list");
        // $router->get("/group/register", "Group:add");
        // $router->post("/group/save", "Group:save");
        // $router->post("/group/delete/{name}", "Group:delete");
        // $router->post("/group/update", "Group:update");
        // $router->post("/group/load/{name}", "Group:load");


        /** The Config's Screens */
        // $router->namespace("_App");
        // $router->get("/config", "Config:list");
        // $router->get("/config/register", "Config:add");
        // $router->get("/config/edit/{connectionName}", "Config:edit");
        // $router->post("/config/update", "Config:update");
        // $router->post("/config/delete/{connectionName}", "Config:delete");
        // $router->post("/config/save", "Config:save");


        /** Membership Screens */
        // $router->namespace("_App");
        // $router->get("/membership/init", "Membership:init");
        // $router->post("/membership/list", "Membership:list");
        // $router->get("/membership/register/{id}", "Membership:register");
        // $router->post("/membership/update", "Membership:update");
        // $router->get("/membership/no_member", "Membership:noMember");


        /** Occupation Screens */
        // $router->namespace("_App");
        // $router->get("/occupation/init", "Occupation:init");
        // $router->get("/occupation/list", "Occupation:list");
        // $router->get("/occupation/register", "Occupation:register");
        // $router->post("/occupation/edit", "Occupation:edit");
        // $router->post("/occupation/save", "Occupation:save");
        // $router->post("/occupation/delete/id/{id}", "Occupation:delete");


        /** Financial Movement Screens */
        // $router->namespace("_App");
        // $router->get("/moviment", "Moviment:init");
        // $router->get("/moviment/pagination/{page}", "Moviment:init");
        // $router->post("/moviment/{year}/{month}", "Moviment:balance");
        // $router->post("/moviment/summarie", "Moviment:summarie");
        // $router->get("/moviment/new", "Moviment:new");
        // $router->post("/moviment/add", "Moviment:add");
        // $router->post("/moviment/save", "Moviment:save");
        // $router->post("/moviment/update", "Moviment:update");
        // $router->post("/moviment/delete/{id}", "Moviment:delete");


        /** Impressions Screens */
        // $router->namespace("_App");
        // $router->post("/impression", "Impression:init");


        /** Documentation */
        // $router->namespace("_App");
        // $router->get("/documentation/init", "Documentation:init");
        // $router->get("/documentation/add", "Documentation:add");
        // $router->post("/documentation/save", "Documentation:save");
        // $router->post("/documentation/show", "Documentation:show");
        // $router->get("/documentation/show/id/{id}", "Documentation:showImage");


        /** Proof */
        // $router->namespace("_App");
        // $router->get("/proof", "Proof:init");
        // $router->get("/proof/init", "Proof:init");
        // $router->post("/proof/year/{year}", "Proof:month");
        // $router->post("/proof/proof", "Proof:proof");
        // $router->post("/proof/save", "Proof:save");
        // $router->post("/proof/show", "Proof:show");
        // $router->get("/proof/show/id/{id}", "Proof:showImage");


        /** Wallet screens */
        // $router->namespace("_App");
        // $router->get("/wallet", "Wallet:init");
        // $router->post("/wallet", "Wallet:init");


        /** Certificate screens */
        // $router->namespace("_App");
        // $router->post("/certificate", "Certificate:init");
        // $router->get("/certificate", "Certificate:init");
        // $router->post("/certificate/validate", "Certificate:validate");


        /** Image */
        $router->namespace("_App");
        // $router->get("/image/id/{id}", "Image:showImage");
        $router->get("/image/id/{id}", "Image:init");
        $router->post("/image/delete/id/{id}", "Image:delete");
        $router->post("/image/save", "Image:save");


        /** Logout */
        $router->get("/exit", function() {
            (new Session())->destroy();
            echo "<script>window.location.reload()</script>";
        });


        /** Error Routes */
        $router->namespace("_App")->group("/ops");
        $router->get("/{errcode}", "Web:error");


        /** Routes */
        $router->dispatch();


        /**  Error Redirect */
        if($router->error()) {
            $router->redirect("/ops/{$router->error()}");
        }

    } else {
        (new Web())->start();
    }

    ob_end_flush();
