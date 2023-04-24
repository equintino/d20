<style>
    #shield {
        display: flex;//inline-flex;
        flex-direction: row;
        justify-content: center;
        width: 90%;
    }

    #shield fieldset {
        margin-top: 20px;
        overflow: scroll;
        display: grid;
    }

    #shield fieldset i {
        cursor: pointer;
    }

    #shield .group {
        width: 35%;
    }

    #shield button:not(fieldset > button) {
        margin-right: 40px;
        float: right;
    }
</style>
<main id="shield" class="">
    <section class="group">
        <fieldset class="fieldset">
            <legend>GRUPOS</legend>
            <?php foreach($groups as $group): ?>
                <button class="btn btn-oval <?= (
                        $group->id === $login->group_id ? "active" : null
                    ) ?>" data-id="<?= $group->id ?>"><?= $group->name ?></button>
            <?php endforeach ?>
        </fieldset>
        <button class="btn btn-rpg btn-danger" value="add" >Adicionar Grupo</button>
        <button class="btn btn-rpg btn-silver mr-1" value="delete">Excluir Grupo</button>
    </section>
    <section class="screen">
        <fieldset class="fieldset">
            <legend>ACESSOS</legend>
            <?php for($x = 0; $x < count($screens); $x++): ?>
                <span class="mr-2"><i class="fa fa-times" style="color: red"
                    data-page="<?= $pages[$x] ?>"></i> <?= $screens[$x] ?></span>
            <?php endfor ?>
        </fieldset>
        <button class="btn btn-rpg btn-danger" value="save">Gravar</button>
    </section>
</main>
