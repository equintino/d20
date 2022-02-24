<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <title>Login</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="<?= theme("assets/style.css") ?>" />
    </head>
    <body class="login" >
        <div class="header2">
            <span id="alert"></span>
            <!-- Janelas -->
            <div id="mask_main"></div>
            <div id="mask2_main"></div>

            <section id="boxe_main" class="fadeInDown" >
                <div id="title"></div>
                <span id="button" class="close"><i class="fa fa-times-circle"></i></span>
                <span id="message"></span>
                <div id="content"></div>
                <div id="buttons" style="text-align: right"></div>
            </section>

            <section id="boxe2_main" class="fadeInDown" >
                <div id="title"></div>
                <span id="button" class="close"><i class="fa fa-times-circle"></i></span>
                <span id="message"></span>
                <div id="content"></div>
                <div id="buttons" style="text-align: right"></div>
            </section>
        </div><!-- header2 -->
        <section>
            <header class="auth_header">
                <img src="<?= theme("assets/img/logo.png") ?>" alt="logo D20" height='120px' />
            </header>
            <main id="auth_container">
                <!--Signup Container-->
                <div id="login_container">
                    <h2 class="signup_heading" >Entre com seu Login</h2>
                    <div class="login_or"></div>
                    <div id="div_error_box_login" ></div>
                        <form action="<?= theme("main.php") ?>" name='formlogin' id="signinForm" class="signinForm" method="post" >
                        <ul>
                            <li>
                                <input type="text" name="login" id="uname_log" value="" placeholder="Login" class="required requiredField Email fg-input text fg-fw" autofocus autocomplete="off" required />
                            </li>
                            <li>
                                <input type="password" name="password" id="password_log" value="" placeholder="Senha" class="required requiredField  fg-input text fg-fw" required />
                            </li>
                            <li>
                                <button class="btn btn-info btn-lg mt-3" type='submit' style="width: 250px"/>Entrar</button>
                                <input type="hidden" name="submitted" id="submitted" value="true" />
                            </li>
                        </ul>
                        </form>
                </div>
                Revisão <?= ($version ?? null) ?>
            </main>
        </section>
    </body>
</html>
<script type="text/javascript" src="<?= theme("assets/scripts.js") ?>" ></script>
<script>scriptLogin()</script>
