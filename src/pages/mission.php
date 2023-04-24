<main id="mission">
    <?php if(empty($act)): ?>
    <div id="init">
        <?php if($this->group->id == "1" || strtolower($this->group->name) === "mestre"): ?>
            <button class="btn btn-oval" value="new" >Nova</button>
        <?php endif ?>
        <button class="btn btn-oval" value="list">Lista</button>
    </div>
    <?php elseif($act === "add"): ?>
    <section>
        <fieldset class="fieldset">
            <legend>CADASTRO DE MISSÃO</legend>
            <form id="form_mission" method="POST" action="mission/save" enctype="multipart/form-data" >
                <section>
                    <div>
                        <label>Nome:</label>
                        <input class="input-rpg" type="text" name="name" size="50"/>
                    </div>
                    <div>
                        <label>Local:</label>
                        <input class="input-rpg" type="text" name="place" size="50"/>
                    </div>
                    <div>
                        <label>História:</label>
                        <textarea class="input-rpg" rows="5" cols="48" type="text" name="story"
                        style="text-transform: none"></textarea>
                    </div>
                </section>
            </form>
        </fieldset>
        <div style="float: left; margin-left: 40px">
            <button type="button" class="btn btn-rpg btn-silver" value="back">Voltar</button>
        </div>
        <div style="text-align: right; margin-right: 40px">
            <button type="reset" class="btn-rpg btn-silver" value="clear">Limpar</button>
            <button type="submit" class="btn-rpg btn-green" value="save">Salvar</button>
        </div>
    </section>
    <?php elseif($act === "list"): ?>
        <div id="list">
            <section>
                <button class="btn btn-rpg btn-info" style="margin-top: 20px" value="back">Voltar</button>
            </section>
            <section class="left">
                <fieldset class="fieldset">
                    <legend>Missões</legend>
                    <?php foreach($missions as $mission): ?>
                        <div>
                            <button class="btn btn-oval" data-id="<?= $mission->id ?>"
                                data-groupname="<?= $group->name ?>" data-access="<?= (
                                        $group->access ?? null
                                    ) ?>" ><?= $mission->name ?></button>
                        </div>
                    <?php endforeach ?>
                </fieldset>
            </section>
            <section class="midle" title="Clique para editar mapa">
                <fieldset class="fieldset">
                    <legend>Mapas</legend>
                    <div id="images"></div>
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
