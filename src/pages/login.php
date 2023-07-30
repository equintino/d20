<style>
    #auth_header {
        margin: 15px auto 0;
    }

    #auth_container .text, #auth_container .password {
        padding: 13px 5px 11px 10px;
        width: 76%;
    }

    #auth_container input, #auth_container button, #auth_container select,
    #auth_container optgroup, #auth_container textarea {
        margin: 0;
        font-family: inherit;
        line-height: inherit;
    }

    #auth_container ul {
        list-style: none;
    }

    #auth_container, #stripe_container {
        text-align: center;
    }

    #auth_container ul li {
        margin-bottom: 8px;
    }

    #auth_container ul {
        list-style: none;
        margin-bottom: 0;
    }

    #auth_container a:hover {
        text-decoration: none;
    }

    #auth_container h2 {
        margin-bottom: -5px;
        padding-bottom: 0;
        font-size: 1.4rem;
        font-weight: bolder;
    }
</style>
<header id="auth_header">
    <img src="<?= url() . "/" . theme("assets/img/logo.png") ?>" alt="logo D20" height='120px' />
</header>
<main id="auth_container">
    <div id="login_container">
        <h2 class="" >Entre com seu Login</h2>
        <div class="login_or"></div>
        <div id="div_error_box_login" ></div>
        <form action="#" name='formlogin'
            id="signinForm" class="signinForm" method="post" >
            <ul>
                <li>
                    <input type="text" name="login" id="uname_log" value=""
                    placeholder="Login" class="required requiredField Email text"
                    autofocus autocomplete="off" required />
                </li>
                <li>
                    <input type="password" name="password" id="password_log" value=""
                    placeholder="Senha" class="required requiredField  text"/>
                </li>
                <li>
                    <select name="db" placeholder="Banco de Dados"
                        class="text" required style="width: 77%">
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
    <div><a id="add" href="#!" >Novo Cadastro</a></div>
    Revisão <span id="version"></span>
</main>
