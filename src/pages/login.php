<header class="auth_header">
    <img src="<?= url() . "/" . theme("assets/img/logo.png") ?>" alt="logo D20" height='120px' />
</header>
<main id="auth_container">
    <!--Signup Container-->
    <div id="login_container">
        <h2 class="signup_heading" >Entre com seu Login</h2>
        <div class="login_or"></div>
        <div id="div_error_box_login" ></div>
        <form action="#" name='formlogin'
            id="signinForm" class="signinForm" method="post" >
            <ul>
                <li>
                    <input type="text" name="login" id="uname_log" value=""
                    placeholder="Login" class="required requiredField Email fg-input text fg-fw"
                    autofocus autocomplete="off" required />
                </li>
                <li>
                    <input type="password" name="password" id="password_log" value=""
                    placeholder="Senha" class="required requiredField  fg-input text fg-fw"/>
                </li>
                <li>
                    <select name="db" placeholder="Banco de Dados"
                        class="fg-input text fg-fw" required style="width: 77%">
                        <option></option>
                    </select>
                </li>
                <li>
                    <button class="btn btn-info btn-lg mt-3" type='submit'
                        style="width: 250px"/>Entrar</button>
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                </li>
            </ul>
        </form>
    </div>
    <div><a id="add" href="#" >Novo Cadastro</a></div>
    Revisão <span id="version"></span>
</main>
