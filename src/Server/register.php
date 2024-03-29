<style>
    #edit {
        padding: 50px;
        background: #434343;
        text-align: left;
    }

    #edit .label {
        color: white;
    }
</style>
<div id="edit">
    <form id="loginRegister" action="#" method="POST" class="form-horizontal">
        <div class="form-row mb-2">
            <div class="col-md">
                <input name="id" type="hidden" value="<?= (isset($user) ? $user->id : null) ?>" />
                <label class="label" for="name" >Nome Completo: </label><br>
                <input id="name" name="name" class="form-input" type="text" required="required"
                value="<?= (isset($user) ? $user->name : null) ?>" autofocus=true/></div>
            <div class="col-md">
                <label class="label" for="email">Email:</label><br>
                <input type="text" class="form-input" id="email" name="email" required="required"
                style="text-transform: lowercase" value="<?= (isset($user)
                ? $user->email : null) ?>"/></div><!-- col -->
        </div><!-- row -->
        <div class="form-row mb-2">
            <div class="col-md">
                <label for="login" class="label">Login:</label><br>
                <input type="text" class="form-input" id="login" name="login"
                value="<?= ((isset($user) ? $user->login : null)) ?>" required="required"/></div><!-- col -->
            <div class="col-md">
                <label for="password" class="label">Senha: </label><br>
                <input type="password" class="form-input" id="password" name="password"
                <?= (isset($user)  ? "disabled" : ("required='required'")) ?> /></div><!-- col -->
            <div class="col-md">
                <label for="confPassword" class="label">Confirme: </label><br>
                <input type="password" class="form-input" id="confPassword" name="confPassword"
                <?= (isset($user) ? "disabled" : ("required='required'")) ?>/></div><!-- col -->
        </div>
        <div class="row mr-4" >
            <div class="col-2">
                <label for="grupo" class="label" >Tipo:</label><br>
                <select name="group_id" class="form-input" required>
                    <option value=""></option>
                    <?php foreach ($this->group as $group): ?>
                        <?php if ($group->id !== 1): ?>
                            <option value="<?= $group->id ?>"><?= $group->name ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-md">
                <label for="visivel" class="label mb-3">ATIVO: &nbsp&nbsp</label><br>
                <label class="label">SIM </label><input class="form-radio" type="radio" name="active"
                value=1 <?= (isset($user) && $user->active == 1 ? "checked" : null) ?> />
                <label class="label"> NÃO </label><input type="radio" name="active" value=0
                <?= (isset($user) && $user->active == "0" ? "checked" : null) ?> />
            </div><!-- col -->
        </div>
        <button type="submit" class="button save" style="float: right;"><?= (isset($user)
        ? "Gravar Alteração" : "Salvar") ?></button>
        <button type="reset" class="button cancel" style="float: right;">Limpar</button>
    </form>
</div>
