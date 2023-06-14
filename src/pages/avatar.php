<main id="avatar">
    <?php if(empty($act)): ?>
    <div id="init">
        <button class="btn btn-oval" value="new">Novo</button>
        <button class="btn btn-oval" value="list">Lista</button>
    </div>
    <?php elseif($act === "add"): ?>
    <fieldset class="fieldset">
        <legend>CADASTRO DE AVATARES</legend>
        <form id="form_avatar" method="POST" action="avatar/save" enctype="multipart/form-data" >
            <section class="side-left">
                <div>
                    <label>Raça:</label>
                    <select class="input-rpg" name="breed_id" required>
                        <option value=""></option>
                        <?php foreach($breeds as $breed): ?>
                        <option value="<?= $breed->id ?>"><?= $breed->name ?></option>
                        <?php endforeach ?>
                    </select>
                    <label>Classe:</label>
                    <select class="input-rpg" name="category_id" required>
                        <option value=""></option>
                        <?php foreach($categories as $category): ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <label>Gênero:</label>
                    <input class="input-rpg" type="radio" name="sex" value="M" required/>
                    <label>Maculino:</label>
                    <input class="input-rpg" type="radio" name="sex" value="F" required/>
                    <label>Feminino:</label>
                </div>
                <div>&nbsp&nbsp&nbsp</div>
                <div>
                    <label>Imagem:</label>
                    <input id="image" class="input-rpg" type="file" name="image[]"  multiple required/>
                </div>
                <div>
                    <label>Descrição:</label>
                    <textarea class="input-rpg" rows="5" cols="48" type="text" name="description"
                        style="text-transform: none" ></textarea>
                </div>
            </section>
            <section class="side-right" style="justify-content: center">
                <img id="thumb_image" src="" alt="" height="250px"/>
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
    <?php elseif($act === "list"): ?>
        <div id="list">
            <section>
                <button class="btn btn-rpg btn-info" style="margin-top: 20px" value="back">Voltar</button>
            </section>
            <section class="left">
                <fieldset class="fieldset">
                    <legend>Raças/Classes</legend>
                    <div id="breeds" style="border-right: 1px solid white; width: 50%">
                    <?php foreach($breeds as $breed): ?>
                        <div>
                            <input type="radio" name="breed" value="<?= $breed->id ?>" />
                            <label><?= strToUpper($breed->name) ?></label>
                        </div>
                    <?php endforeach ?>
                    </div>
                    <div id="categories" style="margin-left: 30px">
                    <?php foreach($categories as $category): ?>
                        <div>
                            <input type="radio" name="category" value="<?= $category->id ?>" />
                            <label><?= strToUpper($category->name) ?></label>
                        </div>
                    <?php endforeach ?>
                    </div>
                </fieldset>
            </section>
            <section class="right">
                <fieldset class="fieldset">
                    <legend>Avatar</legend>
                    <div class="avatar"></div>
                </fieldset>
            </section>
            <section>
                <button class="btn btn-rpg btn-danger" style="margin-top: 20px" value="edit">Editar</button>
            </section>
        </div>
    <?php endif ?>
</main>
