<style>
    #breed {
        margin-top: 40px;
    }

    #breed #init {
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #breed #init button {
        width: 180px;
        font-size: 1.5em;
    }

    #breed #list {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    #breed #list .fieldset {
        margin-top: 0;
    }

    #breed #list .left {
        width: 30%;
        text-align: center;
    }

    #breed #list .left button {
        width: 130px;
    }

    #breed #list .left .fieldset, #list .right .fieldset {
        height: 550px;
    }

    #breed #list .left .fieldset {
        overflow: auto;
    }

    #breed #list .right {
        width: 60%;
    }

    #breed #list .right > .fieldset {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<main id="breed">
    <?php if(empty($act)): ?>
    <div id="init">
        <button class="btn btn-oval" value="new">Nova</button>
        <button class="btn btn-oval" value="list">Lista</button>
    </div>
    <?php elseif($act === "add"): ?>
    <fieldset class="fieldset">
        <legend>CADASTRO DE RAÇAS</legend>
        <form id="form_breed" method="POST" action="breed/save" enctype="multipart/form-data" >
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
                <img id="thumb_image" src="#" alt="" height="350px" />
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
                    <legend>Raças</legend>
                    <?php foreach($breeds as $breed): ?>
                        <button class="btn btn-oval" data-id="<?= $breed->id ?>"
                            data-image_id="<?= $breed->image_id ?>"><?= $breed->name ?></button>
                    <?php endforeach ?>
                </fieldset>
            </section>
            <section class="right">
                <fieldset class="fieldset">
                    <legend>Avatar</legend>
                    <div id="avatar"></div>
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
            thumbImage(image, thumb_image)
        }
    }
    breed.onclick = (e) => {
        loading.show()
        let btnName = e.target.value
        switch(btnName) {
            case "new":
                $(".content").load("breed/add", function() {
                    loading.hide()
                })
                break
            case "list":
                $(".content").load("breed/list", function() {
                    loading.hide()
                })
                break
            case "back":
                $(".content").load("breed", function() {
                    loading.hide()
                })
                break
            case "clear":
                for(let i=0; i < form_breed.length; i++) {
                    form_breed[i].value = ""
                    thumb_image.src = "#"
                }
                loading.hide()
                break
            case "save":
                let formData = new FormData(form_breed)
                let url = form_breed.action.split("/")
                let link = url[4] + "/" + url[5]
                if(saveData(link, formData)) {
                    for(let i=0; i < form_breed.length; i++) {
                        form_breed[i].value = ""
                        thumb_image.src = "#"
                    }
                }
                loading.hide()
                break
            case "edit":
                if(typeof(avatar.children[0]) !== "undefined") {
                    let id = avatar.children[0].attributes["data-id"].value
                    modal.show({
                        title: "Modo de edição de RAÇAS",
                        content: "breed/edit",
                        params: { id },
                        buttons: "<button class='btn btn-rpg btn-silver mr-1' value='delete'>Excluir</button><button class='btn btn-rpg btn-green' value='save'>Salvar</button>"
                    }).on("click", function(e) {
                        if(e.target.value === "save") {
                            let formData = new FormData($(e.target.offsetParent).find("form")[0])
                            if(saveData("breed/save", formData)) {
                                modal.hideContent();
                            }
                        } else if(e.target.value === "delete") {
                            modal.confirm({
                                title: "Modo de Exclusão",
                                message: "Deseja realmente excluir esta RAÇA?"
                            }).on("click", function(i) {
                                if(i.target.value === "1") {
                                    let name = modal.content.find("[name=name]").val()
                                    $.ajax({
                                        url: "breed/delete",
                                        type: "POST",
                                        dataType: "JSON",
                                        data: {
                                            name
                                        },
                                        beforeSend: function() {
                                            loading.show()
                                        },
                                        success: function(response) {
                                            alertLatch("Breed removed successfully", "var(--cor-success)")
                                            modal.hideContent()
                                            $(".content").load("breed/list", function() {
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

        if(typeof(e.target.attributes["data-id"]) !== "undefined") {
            let id = e.target.attributes["data-id"].value
            let image_id = e.target.attributes["data-image_id"].value
            avatar.innerHTML = "<img data-id='" + id + "' src='image/id/" + image_id + "' alt='' height='350px'/>"
            loading.hide()
        }
    }

    /** Keep actived the button */
    $(".btn-oval").on("click", function() {
        $(".btn-oval").removeClass("active")
        $(this).addClass("active")
    })
</script>
