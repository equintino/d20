<style>
    #edit {
        text-align: left;
        padding: 10px 20px 20px;
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
        <div class="row col-4">
            <label for="grupo" class="label-rpg" >Grupo:</label><br>
            <select name="group_id" class="form-input" >
                <option value=""></option>
                <?php foreach($groups as $group): ?>
                <option value="<?= $group->id ?>" <?= (isset($user)
                && $user->group_id ==  $group->id) ? "selected" : null ?>><?= $group->name ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </form>
</div>
