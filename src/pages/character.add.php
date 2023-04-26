<main id="character">
    <div class='add'>
        <fieldset class="fieldset">
            <legend>CADASTRO DE PERSONAGEM</legend>
            <form enctype="multipart/form-data" id="myCharacter" action="character/save" method="POST">
                <section class="side-left">
                    <label>Jogador: </label>
                    <input class="input-rpg" name="name" value="<?= (strtoupper($login->login) ??
                        null) ?>" disabled />
                    <input type="hidden" name="user_id" value="<?= ($login->id ?? null) ?>" />
                    <label>Personagem: </label>
                    <input class="input-rpg" type="text" name="personage" required>
                    <div style="flex-grow: 2">
                        <button id="myBreed" class="btn-rpg" value="breed">Raça</button>
                        <strong class="breed">&nbsp</strong>
                    </div>
                    <div style="flex-grow: 2">
                        <label>Classe: </label>
                        <span>
                            <select id="myClass" class="input-rpg" name="class" required>
                                <option></option>
                                <?php foreach ($classes as $class): ?>
                                <option value="<?= $class->id ?>"><?= strtoupper($class->name) ?></option>
                                <?php endforeach ?>
                            </select>
                        </span>
                    </div>
                    <div>
                        <label>Tendência 1: </label>
                        <select id="tred1" class="input-rpg" name="trend1" required>
                            <option></option>
                            <option value="good">BOM</option>
                            <option value="neutral">NEUTRO</option>
                            <option value="bad">MAU</option>
                        </select>
                        <label>Tendência 2: </label>
                        <select id="tred2" class="input-rpg" name="trend2" required>
                            <option></option>
                            <option value="leal">LEAL</option>
                            <option value="neutral">NEUTRO</option>
                            <option value="chaotic">CAÓTICO</option>
                        </select>
                    </div>
                    <div id="description"  style="background: url('d20/<?= url() . "/"
                        . theme("assets/img/pergaminho.png") ?>'); background-repeat: round">
                        <p></p>
                    </div>
                    <script>var jogador='<?= $login->login ?>';</script>
                </section>
                <section class=".side-right" >
                    <div id="avatar"></div>
                </section>
            </form>
        </fieldset>
        <div style="float: left; margin-left: 40px">
            <button type="button" class="btn btn-rpg btn-silver" value="back">Voltar</button>
        </div>
        <div class='btn_'>
            <button type="reset" class='btn-rpg btn-silver' value="clear" >Limpar</button>
            <button type="submit" class='btn-rpg btn-green' value="save">Salvar</button>
        </div>
    </div>
</main>