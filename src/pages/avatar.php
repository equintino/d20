<style>
    #thumb_image {
        background: #676767;
        width: 450px;
        align-items: center;
        display: flex;
        overflow-x: auto;
        border-radius:  5px;
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
        width: 40%;
    }

    #list .left button {
        width: 130px;
    }

    #list .left .fieldset, #list .right .fieldset {
        height: 550px;
    }

    #list .left .fieldset {
        display: flex;
        flex-direction: row;
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
                <div id="thumb_image"></div>
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
                    <div class="avatar" style="width: 100%"></div>
                </fieldset>
            </section>
            <section>
                <button class="btn btn-rpg btn-danger" style="margin-top: 20px" value="edit">Editar</button>
            </section>
        </div>
    <?php endif ?>
</main>
<script>
    if(typeof(image) !== "undefined") {
        image.onchange = evt => {
            let links = thumbImage(image, thumb_image)
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
                    if(form_avatar[i].attributes.name.textContent !== "sex") {
                        form_avatar[i].value = ""
                    }
                    $(thumb_image).find("*").remove()
                }
                loading.hide()
                break
            case "save":
                let formData = new FormData(form_avatar)
                let url = form_avatar.action.split("/")
                let link = url[4] + "/" + url[5]
                if(saveData(link, formData)) {
                    for(let i=0; i < form_avatar.length; i++) {
                        if(form_avatar[i].attributes.name.textContent !== "sex") {
                            form_avatar[i].value = ""
                        }
                    }
                    $(thumb_image).find("*").remove()
                }
                loading.hide()
                break
            case "edit":
                if(typeof(imageAvatar) !== "undefined") {
                    let id = $(imageAvatar).find(".slick-list img[aria-hidden=false]").attr("id")
                    modal.show({
                        title: "Modo de edição de AVATARES",
                        content: "avatar/edit",
                        params: { id },
                        buttons: "<button class='btn btn-rpg btn-silver mr-1' value='delete'>Excluir</button><button class='btn btn-rpg btn-green' value='save'>Salvar</button>"
                    }).on("click", function(e) {
                        if(e.target.value === "save") {
                            let formData = new FormData($(e.target.offsetParent).find("form")[0])
                            if(saveData("avatar/save", formData)) {
                                modal.close();
                            }
                        } else if(e.target.value === "delete") {
                            modal.confirm({
                                title: "Modo de Exclusão",
                                message: "Deseja realmente excluir este AVATAR?"
                            }).on("click", function(i) {
                                if(i.target.value === "1") {
                                    let id = modal.content.find("[name=id]").val()
                                    $.ajax({
                                        url: "avatar/delete",
                                        type: "POST",
                                        dataType: "JSON",
                                        data: {
                                            id
                                        },
                                        beforeSend: function() {
                                            loading.show()
                                        },
                                        success: function(response) {
                                            alertLatch("Breed removed successfully", "var(--cor-success)")
                                            modal.close()
                                            $(".content").load("avatar/list", function() {
                                                loading.hide()
                                            })
                                        },
                                        error: function(error) {

                                        },
                                        complete: function() {
                                            loading.hide()
                                        }

                                    })
                                }
                            })
                        }
                    })
                } else {
                    loading.hide()
                }
                break
            default:
                loading.hide()
        }
    }
    var breedClass = avatar.getElementsByClassName("left")
    var breed_id;
    var category_id;
    if(typeof(breeds) !== "undefined") {
        document.getElementById("breeds").onclick = (i) => {
            breed_id = i.target.value
            avatarsShow()
        }
    }
    if(typeof(categories) !== "undefined") {
        document.getElementById("categories").onclick = (i) => {
            category_id = i.target.value
            avatarsShow()
        }
    }
    var avatarsShow = () => {
        $(".avatar").find("*").remove()
        if($(breeds).find(":checked").length > 0 && $(categories).find(":checked").length > 0) {
            loading.show()
            $.ajax({
                url: "avatar",
                type: "POST",
                dataType: "JSON",
                cache: true,
                data: {
                    breed_id,
                    category_id
                },
                beforeSend: function() {
                },
                success: function(response) {
                    if(typeof(response) === "string") {
                        return alertLatch(response, "var(--cor-warning)")
                    }
                    $(".avatar").load("avatar/show", { response }, function() {
                        loading.hide()
                        $(".avatar").find("[name=class]").closest("section").remove()
                        $(breed_description).css("margin-top","-80px")
                    })
                },
                error: function(error) {
                },
                complete: function() {
                }
            })
        }
    }
</script>
