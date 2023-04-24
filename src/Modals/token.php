<style>
    #formToken {
        display: grid;
    }

    #formToken label {
        color: white;
        font-weight: bolder;
    }

    #formToken input {
        width: 100%;
    }
</style>
<form id="formToken" class="form-signin" action="#" method="POST" >
    <input type="hidden" name="login" value="<?= $login ?>" />
    <input class="form-control" type="password" name="password" autofocus/>
    <label class="label" for="password">Digite sua nova senha</label>
    <input class="form-input" type="password" name="confPassword" />
    <label class="label" for="confPassword">Confirme</label>
    <button id="btn-token" class="button-style mt-3" >Enviar</button>
</form>
