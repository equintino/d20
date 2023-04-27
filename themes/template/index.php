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
            /* #login_container {
                margin-bottom: -8px;
            }

            #login a:hover {
                text-decoration: none;
            }*/

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
            <section class="loading">
                <!-- <img class="schedule" src="themes/template/assets/loading.png" alt="reading" height="50px"/> -->
                <img class="schedule" src="" alt="" height="50px"/>
                <!-- <p class="text-loading">Texto da ação "loading"</p> -->
            </section>
            <span id="alert" style="display: none;"></span>
            <!-- Janelas -->
            <div id="mask_main" style="display: none"></div>
            <!-- <div id="mask2_main"></div> -->

            <section id="boxe_main" class="fadeInDown" >
                <div id="title"></div>
                <span id="close"><i class="fa fa-times-circle"></i></span>
                <span id="message"></span>
                <div id="content"></div>
                <div id="buttons" style="text-align: right"></div>
            </section>

            <!-- <section id="boxe2_main" class="fadeInDown" >
                <div id="title"></div>
                <span id="button" class="close"><i class="fa fa-times-circle"></i></span>
                <span id="message"></span>
                <div id="content"></div>
                <div id="buttons" style="text-align: right"></div>
            </section> -->
        </div><!-- header2 -->
        <section>
            <div id="container_main" ></div>
        </section>
    </body>
</html>
<script type="module" src="./shared/scripts/src/index.js" ></script>
<!-- <script type="text/javascript" src="<?= url() . "/" . theme("assets/scripts.js") ?>" ></script> -->