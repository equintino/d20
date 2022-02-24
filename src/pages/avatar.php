<style>
    #thumb_image {
        background: #676767;
        width: 450px;
        height: 400px;
        /* text-align: center; */
        justify-content: center;
        align-items: center;
        display: flex;
        overflow-x: scroll;
        border: 1px solid #737070;
        border-radius:  5px;
        padding-left: 10px;
    }

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
    }

    #list .right > .fieldset {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<main id="avatar">
    <?php if(empty($act)): ?>
    <div id="init">
        <button class="btn btn-oval" value="new">Novo</button>
        <button class="btn btn-oval" value="list">Lista</button>
        <!-- <button class="btn btn-oval" value="avatar">Avatar</button> -->
    </div>
    <?php elseif($act === "add"): ?>
    <fieldset class="fieldset">
        <legend>CADASTRO DE AVATARES</legend>
        <form id="form_avatar" method="POST" action="avatar/save" enctype="multipart/form-data" >
            <section class="side-left">
                <div>
                    <label>Raça:</label>
                    <select class="input-rpg" name="breed_id">
                        <option value=""></option>
                        <?php foreach($breeds as $breed): ?>
                        <option value="<?= $breed->id ?>"><?= $breed->name ?></option>
                        <?php endforeach ?>
                    </select>
                    <label>Classe:</label>
                    <select class="input-rpg" name="category_id">
                        <option value=""></option>
                        <?php foreach($categories as $category): ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
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
                    <input id="image" class="input-rpg" type="file" name="image[]"  multiple />
                </div>
                <div>
                    <label>Descrição:</label>
                    <textarea class="input-rpg" rows="5" cols="48" type="text" name="description" style="text-transform: none"></textarea>
                </div>
            </section>
            <section class="side-right" style="justify-content: center">
                <div id="thumb_image">
                    <!-- <img src="src/<?= theme("assets/img/avatar/anao.png") ?>" alt="fig1" height="250px"/>
                    <img src="src/<?= theme("assets/img/avatar/elfo.png") ?>" alt="fig1" height="250px"/> -->
                </div>
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
                    <legend>Raças</legend>
                    <?php foreach($avatars as $avatar): ?>
                        <button class="btn btn-oval" data-id="<?= $avatar->id ?>" data-image_id="<?= $avatar->image_id ?>"><?= $avatar->name ?></button>
                    <?php endforeach ?>
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
    <?php //elseif($act === "avatar"): ?>
        <!-- <fieldset class="fieldset"> -->
        <!-- <legend>ADICIONAR AVATAR</legend> -->
        <!-- <form id="form_breed" method="POST" action="avatar/save" enctype="multipart/form-data" > -->
            <!-- <section class="side-left">
                <div>
                    <label>Raça:</label>
                    <select class="input-rpg" name="breed">
                        <option value="0"></option>
                        <?php foreach($breeds as $breed): ?>
                        <option value="<?= $breed->id ?>"><?= strToUpper($breed->name) ?></option>
                        <?php endforeach ?>
                    </select>
                    <input class="input-rpg" type="text" name="name" />
                    <label>Classe:</label>
                    <select class="input-rpg" name="class">
                        <option value="0"></option>
                        <?php foreach($categories as $category): ?>
                        <option valeu="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach ?>
                    </select>
                    <input class="input-rpg" type="text" name="class" />
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
            </section> -->
            <!-- <section class="side-right" style="justify-content: center">
                <img id="thumb_image" src="#" alt="" height="250px"/>
            </section> -->
            <!-- <table class="my-table"></table> -->
        <!-- </form> -->
        <!-- </fieldset> -->
        <!-- <div style="float: left; margin-left: 40px">
            <button class="btn-rpg btn-silver" type="button" value="back">Voltar</button>
        </div> -->
        <!-- <div style="text-align: right; margin-right: 40px">
            <button type="reset" class="btn-rpg btn-silver" value="clear">Limpar</button>
            <button type="submit" class="btn-rpg btn-green" value="save">Salvar</button>
        </div> -->
    <?php endif ?>
</main>
<script>
    if(typeof(image) !== "undefined") {
        image.onchange = evt => {
            let links = thumbImage(image, thumb_image)
            // let img = thumb_image;
            // let section = img.parentElement
            $(thumb_image).append(links)
        }
    }
    avatar.onclick = (e) => {
        loading.show()
        let btnName = e.target.value
        switch(btnName) {
            case "new":
                $(".content").load("avatar/add", function() {
                    loading.hide()
                })
                break
            case "list":
                $(".content").load("avatar/list", function() {
                    loading.hide()
                })
                break
            case "back":
                $(".content").load("avatar", function() {
                    loading.hide()
                })
                break
            case "clear":
                for(let i=0; i < form_avatar.length; i++) {
                    form_avatar[i].value = ""
                    thumb_image.src = "#"
                }
                loading.hide()
                break
            case "save":
                let formData = new FormData(form_avatar)
                let url = form_avatar.action.split("/")
                let link = url[4] + "/" + url[5]
                if(saveData(link, formData)) {
                    for(let i=0; i < form_avatar.length; i++) {
                        form_avatar[i].value = ""
                    }
                    $(thumb_image).find("img").remove()
                }
                loading.hide()
                break
            case "edit":
                let id = avatar.children[0].attributes["data-id"].value
                modal.show({
                    title: "Modo de edição de RAÇAS",
                    content: "breed/edit",
                    params: { id }
                })
                break
            default:
                loading.hide()
        }

        if(typeof(e.target.attributes["data-id"]) !== "undefined") {
            let id = e.target.attributes["data-id"].value
            let image_id = e.target.attributes["data-image_id"].value
            // avatar.innerHTML = "<img data-id='" + id + "' src='image/id/" + image_id + "' alt='' height='350px'/>"
            loading.hide()
        }
    }
</script>
