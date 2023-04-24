<style>
    #conf_file {
        padding: 20px;
    }

    #conf_file label {
        color: white;
        float: left;
    }

    #conf_file input, #config-form select {
        width: 100%;
    }
</style>
<div id="conf_file">
    <form id="config-form" class="form-horizontal" action="#" method="POST">
        <?php //if(!empty($act) && $act === "add"): ?>
        <div class="form-group">
            <label class="label" for="connectionName">Nome da Conexão: </label>
            <input class="form-input" type="text" name="connectionName" required/>
        </div>
        <?php //else: ?>
            <!-- <input type="hidden" name=connectionName value="<?= ($config->local ?? null) ?>"> -->
        <?php //endif; ?>
        <div class="form-group">
            <label class="label" for="type" >Tipo: </label><br>
            <select class="form-input" name="type" required>
                <option value=""></option>
                <?php foreach($types as $type): ?>
                <option value="<?= $type ?>" <?= (
                        !empty($config) && $config->type() === $type ? "selected" : null
                    ) ?>><?= $type ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label class="label" for="address">Endereço IP/Porta(000.000.000.000,0000): </label>
            <input class="form-input" type="text" name="address" value="<?= (
                    !empty($config) ? $config->address() : null
                ) ?>" autocomplete="off" required/>
        </div>
        <div class="form-group">
            <label class="label" for="db">Nome do Banco: </label>
            <input class="form-input" type="text" name="db" value="<?= (
                    !empty($config) ? $config->database() : null
                ) ?>" autocomplete="off" required/>
        </div>
        <div class="form-group">
            <label class="label" for="user">Usuário do Banco: </label>
            <input class="form-input" type="text" name="user" value="<?= (
                    !empty($config) ? $config->user() : null
                ) ?>" autocomplete="off" required/>
        </div>
        <?php if(empty($config->local)): ?>
        <div class="form-group">
            <label class="label" for="passwd">Senha: </label></br>
            <input class="form-input" type="password" name="passwd" autocomplete="off" />
        </div>
        <button class='button-style mt-3' style='margin-top: 10px' >Save</button>
        <?php endif ?>
    </form>
</div>
