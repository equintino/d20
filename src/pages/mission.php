<style>
    #mission #register {
        margin: 40px auto;
        width: 700px;

    }

    #mission .buttons {
        float: right;
        margin-right: 40px;
    }

    #mission #images img {
        height: 230px;
    }

    #mission #images {
        position: relative;
        width: 480px;
    }

    #mission .middle fieldset {
        overflow: hidden;
    }

    #mission .btnSelection {
        width: 250px;
    }

    #mission .btnSelection button {
        width: 130px;
    }
</style>
<main id="mission">
    <?php if (empty($act)): ?>
    <div id="init">
        <?php if ($this->group->id == "1" || strtolower($this->group->name) === "mestre"): ?>
            <button class="btn btn-oval" value="new" >Nova</button>
        <?php endif ?>
        <button class="btn btn-oval" value="list">Lista</button>
    </div>
    <?php elseif ($act === "add"): ?>
    <div id="add">
        <section>
            <button class="btn btn-rpg btn-info" style="margin-top: 20px" value="back">Voltar</button>
        </section>
        <section id="register">
            <fieldset class="fieldset">
                <legend>CADASTRO DE MISSÃO</legend>
                <form id="form_mission" method="POST" action="mission/save" enctype="multipart/form-data" >
                    <section>
                        <div>
                            <label>Nome:</label>
                            <input class="input-rpg" type="text" name="name" size="50" required/>
                        </div>
                        <div>
                            <label>Local:</label>
                            <input class="input-rpg" type="text" name="place" size="50" required/>
                        </div>
                        <div>
                            <label>História:</label>
                            <textarea class="input-rpg" rows="5" cols="48" type="text" name="story"
                            style="text-transform: none" required></textarea>
                        </div>
                    </section>
                </form>
            </fieldset>
            <!-- <div style="float: left; margin-left: 40px">
                <button type="button" class="btn btn-rpg btn-silver" value="back">Voltar</button>
            </div> -->
            <!-- <div style="text-align: right; margin-right: 40px"> -->
            <div class="buttons">
                <button type="reset" class="btn-rpg btn-silver" value="clear">Limpar</button>
                <button type="submit" class="btn-rpg btn-green" value="save">Salvar</button>
            </div>
        </section>
    </div>
    <?php elseif($act === "list"): ?>
        <div id="list">
            <section>
                <button class="btn btn-rpg btn-info" style="margin-top: 20px" value="back">Voltar</button>
            </section>
            <section class="left">
                <fieldset class="fieldset btnSelection">
                    <legend>Missões</legend>
                    <?php foreach($missions as $mission): ?>
                            <button class="btn btn-oval" data-id="<?= $mission->id ?>"
                                data-groupname="<?= $group->name ?>" data-map_id="<?=
                                $mission->map_id ?>" data-access="<?= (
                                        $group->access ?? null
                                    ) ?>" value="<?= $mission->id ?>"><?= $mission->name ?></button>
                    <?php endforeach ?>
                </fieldset>
            </section>
            <section class="middle" title="Clique para mudar mapa">
                <fieldset class="fieldset">
                    <legend>Mapas</legend>
                    <div id="images"></div>
                    <p style="float: left">Total de Mapas: </p>
                    <?php if (strpos($group->access, "*") || strtolower($group->name) === "mestre"): ?>
                    <button class="btn btn-rpg btn-danger" value="map" style="float: right">Editar Mapa</button>
                    <?php endif ?>
                </fieldset>
            </section>
            <section>
                <fieldset class="fieldset" style="height: 100%">
                    <legend>História</legend>
                    <div id="story"></div>
                </fieldset>
                <fieldset class="fieldset" style="height: 100%">
                    <legend>Personagens</legend>
                    <div id="personage"></div>
                </fieldset>
            </section>
            <section>
                <?php if (strpos($group->access, "*") || strtolower($group->name) === "mestre"): ?>
                    <button class="btn btn-rpg btn-danger" style="margin-top: 20px" value="edit">Editar</button>
                <?php else: ?>
                    <button class="btn btn-rpg btn-danger" style="margin-top: 20px" value="include">SE CANDIDATAR
                    </button>
                <?php endif ?>
            </section>
        </div>
    <?php endif ?>
</main>
