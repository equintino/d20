<!DOCTYPE html>
<html lang="bt_br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <title>Login</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="<?= url() . "/" . theme("assets/style.css") ?>" />
        <style>
            #container_main {
                display: grid;
                margin-top: 60px;
            }
        </style>
    </head>
    <body class="body" >
        <header>
            <div id="top" style="display: none">
                <?php require __DIR__ . "/top.php"; ?>
            </div>
        </header>
        <div class="header2">
            <section class="loading" style="display: none">
                <img class="schedule" src="" alt="" height="50px"/>
            </section>
            <span id="alert" style="display: none;"></span>

            <section id="boxe_main" class="fadeInDown" style="display: none">
                <div id="title"></div>
                <span id="close"><i class="fa fa-times-circle"></i></span>
                <span id="message"></span>
                <div id="content"></div>
                <div id="buttons" style="text-align: right"></div>
                <div id="mask_main" style="display: none"></div>
            </section>

            <section id="boxe2_main" class="fadeInDown" style="display: none">
                <div id="title2"></div>
                <span id="close2"><i class="fa fa-times-circle"></i></span>
                <span id="message2"></span>
                <div id="content2"></div>
                <div id="buttons2" style="text-align: right"></div>
                <div id="mask2_main" style="display: none"></div>
            </section>
        </div>
        <section>
            <div id="container_main" ></div>
        </section>
    </body>
</html>
<script type="module" src="./shared/scripts/src/index.js" ></script>