<style>
    #character .add {
        max-width: 1400px;
    }

    #character .description {
        height: 280px;
        width: 100%;
        font-family: 'Libre Franklin', sans-serif;
        font-weight: bolder;
        letter-spacing: .1em;
        padding: 60px 70px 0px 100px;
    }

    #character .description > p {
        overflow: auto;
        height: 160px;
        color: black;
        text-shadow: 1px 1px 1px black;
    }
</style>
<main id="character">
    <div class='add'>
        <fieldset class="fieldset">
            <legend>CADASTRO DE PERSONAGEM</legend>
            <form enctype="multipart/form-data" id="myCharacter" action="character/save" method="POST">
                <input type="hidden" name="image_id" value="" />
                <input type="hidden" name="story" value="" />
                <section class="side-left">
                    <label>Jogador: </label>
                    <input class="input-rpg" name="name" value="<?= (strtoupper($user->login) ??
                        null) ?>" disabled />
                    <input type="hidden" name="user_id" value="<?= ($user->id ?? null) ?>" />
                    <label>Personagem: </label>
                    <input class="input-rpg" type="text" name="personage" required>
                    <div style="flex-grow: 2">
                        <button id="myBreed" class="btn-rpg" value="breed">Raça</button>
                        <strong class="breed">&nbsp</strong>
                        <input type="hidden" name="breed_id" value="" />
                    </div>
                    <div style="flex-grow: 2">
                        <label>Classe: </label>
                        <span>
                            <select id="myClass" class="input-rpg" name="category_id" required>
                                <option></option>
                                <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>"><?= strtoupper($category->name) ?></option>
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
                    <div class="description"  style="background: url('d20/<?= url() . "/"
                        . theme("assets/img/pergaminho.png") ?>'); background-repeat: round">
                        <p></p>
                    </div>
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
