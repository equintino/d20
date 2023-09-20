<style>
    #formToken {
        display: grid;
        margin-top: 20px;
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
    <input type="hidden" name="name" value="<?= $user->name ?>" />
    <input type="hidden" name="email" value="<?= $user->email ?>" />
    <input type="hidden" name="token" value="" />
    <input class="form-control" type="password" name="password" autofocus required/>
    <label class="label" for="password">Digite sua nova senha</label>
    <input class="form-input" type="password" name="confPassword" required/>
    <label class="label" for="confPassword">Confirme</label>
</form>
