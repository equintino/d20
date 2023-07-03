<style>
    #category > fieldset, #category #list {
        margin-top: 40px;
    }

    #category #list {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    #category #list .fieldset {
        margin-top: 0;
    }

    #category #list .left {
        width: 30%;
        text-align: center;
    }

    #category #list .left button {
        width: 130px;
    }

    #category #list .left .fieldset, #category #list .right .fieldset {
        height: 550px;
    }

    #category #list .left .fieldset {
        overflow: auto;
    }

    #category #list .right {
        width: 60%;
        text-align: center;
    }

    #category #list #symbol {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80%;
    }
</style>
<main id="category">
    <?php if(empty($act)): ?>
    <div id="init">
        <button class="btn btn-oval" value="new">Nova</button>
        <button class="btn btn-oval" value="list">Lista</button>
    </div>
    <?php elseif($act === "add"): ?>
    <fieldset class="fieldset">
        <legend>CADASTRO DE CLASSES</legend>
        <form id="form_category" method="POST" action="category/save" enctype="multipart/form-data" >
            <section class="side-left">
                <div>
                    <label>Tipo:</label>
                    <input class="input-rpg" type="text" name="name" required/>
                </div>
                <div>&nbsp&nbsp&nbsp</div>
                <div>
                    <label>Imagem:</label>
                    <input id="image" class="input-rpg" type="file" name="image" required/>
                </div>
                <div>
                    <label>Descrição:</label>
                    <textarea class="input-rpg" rows="5" cols="48" type="text" name="description"
                        style="text-transform: none"></textarea>
                </div>
            </section>
            <section class="side-right" style="justify-content: center">
                <img id="thumb_image" src="#" alt="" height="250px"/>
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
                <fieldset class="fieldset btnSelection">
                    <legend>Classes</legend>
                    <?php foreach($categories as $category): ?>
                        <button class="btn btn-oval" data-image_id="<?= $category->image_id ?>"
                            data-id="<?= $category->id ?>"><?= $category->name ?></button>
                    <?php endforeach ?>
                </fieldset>
            </section>
            <section class="right">
                <fieldset class="fieldset">
                    <legend>Emblema</legend>
                    <div id="symbol"><img src="" alt="" /></div>
                </fieldset>
            </section>
            <section>
                <button class="btn btn-rpg btn-danger" style="margin-top: 20px" value="edit">Editar</button>
            </section>
        </div>
    <?php endif ?>
</main>
