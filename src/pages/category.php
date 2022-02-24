<style>
    #init {
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #init button {
        width: 180px;
        font-size: 1.5em;
    }

    #list {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    #list .fieldset {
        margin-top: 0;
    }

    #list .left {
        width: 30%;
        text-align: center;
    }

    #list .left button {
        width: 130px;
    }

    #list .left .fieldset, #list .right .fieldset {
        height: 550px;
    }

    #list .left .fieldset {
        overflow: auto;
    }

    #list .right {
        width: 60%;
        text-align: center;
    }

    #list #symbol {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80%;
    }
</style>
<main id="category">
    <?php if(empty($act)): ?>
    <div id="init">
        <button class="btn btn-oval" value="new">Novo</button>
        <button class="btn btn-oval" value="list">Lista</button>
    </div>
    <?php elseif($act === "add"): ?>
    <fieldset class="fieldset">
        <legend>CADASTRO DE CLASSES</legend>
        <form id="form_category" method="POST" action="category/save" enctype="multipart/form-data" >
            <section class="side-left">
                <div>
                    <label>Tipo:</label>
                    <input class="input-rpg" type="text" name="name" />
                    <!-- <label>Classe:</label>
                    <input class="input-rpg" type="text" name="class" /> -->
                </div>
                <!-- <div>
                    <label>Gênero:</label>
                    <input class="input-rpg" type="radio" name="sex" value="M"/>
                    <label>Maculino:</label>
                    <input class="input-rpg" type="radio" name="sex" value="F"/>
                    <label>Feminino:</label>
                </div> -->
                <div>&nbsp&nbsp&nbsp</div>
                <div>
                    <label>Imagem:</label>
                    <input id="image" class="input-rpg" type="file" name="image" />
                </div>
                <div>
                    <label>Descrição:</label>
                    <textarea class="input-rpg" rows="5" cols="48" type="text" name="description" style="text-transform: none"></textarea>
                </div>
            </section>
            <section class="side-right" style="justify-content: center">
                <img id="thumb_image" src="#" alt="" height="250px"/>
            </section>
            <!-- <table class="my-table"></table> -->
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
                    <legend>Classes</legend>
                    <?php foreach($categories as $category): ?>
                        <button class="btn btn-oval" data-image_id="<?= $category->image_id ?>" data-id="<?= $category->id ?>"><?= $category->name ?></button>
                    <?php endforeach ?>
                </fieldset>
            </section>
            <section class="right">
                <fieldset class="fieldset">
                    <legend>Emblema</legend>
                    <div id="symbol"></div>
                </fieldset>
            </section>
            <section>
                <button class="btn btn-rpg btn-danger" style="margin-top: 20px" value="edit">Editar</button>
            </section>
        </div>
    <?php elseif($act === "avatar"): ?>
        <!-- <fieldset class="fieldset">
        <legend>ADICIONAR AVATAR</legend>
        <form id="form-breed" method="POST" action="breed/save" enctype="multipart/form-data" >
            <section class="side-left">
                <div>
                    <label>Tipo:</label>
                    <select class="input-rpg" name="breed">
                        <option value="0"></option>
                        <?php foreach($breeds as $breed): ?>
                        <option value="<?= $breed->id ?>"><?= strToUpper($breed->name) ?></option>
                        <?php endforeach ?>
                    </select>
                    <label>Classe:</label>
                    <select class="input-rpg" name="class">
                        <option value="0"></option>
                        <?php foreach($categories as $category): ?>
                        <option valeu="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <label>Gênero:</label>
                    <input class="input-rpg" type="radio" name="sex" value="M"/>
                    <label>Maculino:</label>
                    <input class="input-rpg" type="radio" name="sex" value="F"/>
                    <label>Feminino:</label>
                </div>
                <div>&nbsp&nbsp&nbsp</div>
                <div>
                    <label>Imagem:</label>
                    <input id="image" class="input-rpg" type="file" name="image" />
                </div>
                <div>
                    <label>Descrição:</label>
                    <textarea class="input-rpg" rows="5" cols="48" type="text" name="description" style="text-transform: none"></textarea>
                </div>
            </section>
            <section class="side-right" style="justify-content: center">
                <img id="thumb_image" src="#" alt="" height="250px"/>
            </section>
        </form>
    </fieldset>
    <div style="text-align: right; margin-right: 40px">
        <button type="reset" class="btn-rpg btn-silver" >Limpar</button>
        <button type="submit" class="btn-rpg btn-green" >Salvar</button>
    </div> -->
    <?php endif ?>
</main>
<script>
    if(typeof(image) !== "undefined") {
        image.onchange = evt => {
            thumbImage(image, thumb_image)
        }
    }
    category.onclick = (e) => {
        loading.show()
        let btnName = e.target.value
        switch(btnName) {
            case "new":
                $(".content").load("category/add", function() {
                    loading.hide()
                })
                break;
            case "back":
                $(".content").load("category", function() {
                    loading.hide()
                })
                break;
            case "clear":
                for(let i=0; i < form_category.length; i++) {
                    form_category[i].value = ""
                }
                thumb_image.src = "#"
                loading.hide()
                break;
            case "save":
                let formData = new FormData(form_category)
                if(saveData("category/save", formData)) {
                    for(let i=0; i < form_category.length; i++) {
                        form_category[i].value = ""
                    }
                    thumb_image.src = "#"
                }
                loading.hide()
                break;
            case "list":
                $(".content").load("category/list", function() {
                    loading.hide()
                })
                break;
            case "edit":
                let id = symbol.children[0].attributes["data-id"].value
                modal.show({
                    title: "Modo de edição de CLASSES",
                    content: "category/edit",
                    params: { id }
                })
                break;
            default:
                loading.hide()
        }

        if(typeof(e.target.attributes["data-id"]) !== "undefined") {
            let id = e.target.attributes["data-id"].value
            let image_id = e.target.attributes["data-image_id"].value
            symbol.innerHTML = "<img data-id='" + id + "' src='image/id/" + image_id + "' alt='' height='230px'/>"
            loading.hide()
        }
    }
</script>
