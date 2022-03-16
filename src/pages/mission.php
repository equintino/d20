<style>
    #mission, #mission #list {
        display: flex;
        justify-content: center;
        height: 400px;
        align-items: center;
    }

    #mission #init button {
        width: 180px;
        font-size: 1.5em;
    }

    #mission .fieldset {
        margin-top: 120px;
    }

    #mission #thumb_image {
        background: #676767;
        width: 450px;
        align-items: center;
        display: flex;
        overflow-x: auto;
        border-radius:  5px;
    }

    #mission #list .left {
        text-align: center;
    }

    #mission #list .right {
        cursor: pointer;
    }

    #images {
        width: 400px;
    }
</style>
<main id="mission">
    <?php if(empty($act)): ?>
    <div id="init">
        <button class="btn btn-oval" value="new">Novo</button>
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
                        <textarea class="input-rpg" rows="5" cols="48" type="text" name="story" style="text-transform: none"></textarea>
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
                            <button class="btn btn-oval" data-id="<?= $mission->id ?>" ><?= $mission->name ?></button>
                        </div>
                    <?php endforeach ?>
                </fieldset>
            </section>
            <section class="right" title="Clique para editar mapa">
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
                <button class="btn btn-rpg btn-danger" style="margin-top: 20px" value="edit">Editar</button>
            </section>
        </div>
    <?php endif ?>
</main>
<script>
    var addMap = (nameMission) => {
        $.ajax({
            url: "mission/load/" + nameMission,
            type: "POST",
            dataType: "JSON",
            data: {
                nameMission
            },
            beforeSend: function() {
                loading.show()
            },
            success: function(response) {
                modal.show({
                    title: "Cadastre os MAPAS",
                    content: "map/add",
                    params: {
                        mission: response
                    },
                    buttons: "<button class='btn btn-rpg btn-silver' value='clear' >Limpar</button><button class='btn btn-rpg btn-danger' value='save' >Salvar</button>"
                }).on("click", function(i) {
                    loading.show()
                    let btnName = i.target.value
                    let formData = new FormData(form_map)
                    formData.append("mission_id",response["id"])
                    if(btnName === "save") {
                        if(saveData("map/save", formData)) {
                            for(let i=0; i < form_map.length; i++) {
                                form_map[i].value = ""
                            }
                            thumb_image.src = "#"
                        }
                        loading.hide()
                    } else {
                        for(let i=0; i < form_map.length; i++) {
                            form_map[i].value = ""
                        }
                        thumb_image.src = "#"
                        loading.hide()
                    }
                })
            },
            error: function(error) {
                console.log(error)
            },
            complete: function() {
                loading.hide()
            }
        })
    }
    if(typeof(image) !== "undefined") {
        image.onchange = evt => {
            let links = thumbImage(image, thumb_image)
            $(thumb_image).append(links)
        }
    }
    mission.onclick = (e) => {
        loading.show()
        let btnName = e.target.value
        switch(btnName) {
            case "new":
                $(".content").load("mission/add", function() {
                    loading.hide()
                })
                break
            case "list":
                $(".content").load("mission/list", function() {
                    loading.hide()
                })
                break
            case "back":
                $(".content").load("mission", function() {
                    loading.hide()
                })
                break
            case "clear":
                for(let i=0; i < form_mission.length; i++) {
                    form_mission[i].value = ""
                }
                thumb_image.innerHTML = ""
                loading.hide()
                break
            case "save":
                let formData = new FormData(form_mission)
                let url = form_mission.action.split("/")
                let link = url[4] + "/" + url[5]
                let name
                if(saveData(link, formData)) {
                    nameMission = formData.get("name")
                    addMap(nameMission)
                    /** Clear form */
                    for(let x=0; x < form_mission.length; x++) {
                        form_mission[x].value = ""
                    }
                }
                break
            case "edit":
                if(list.querySelector("button.active") !== null) {
                    let mission_id = list.querySelector(".left button.active").attributes["data-id"].value
                    modal.show({
                        title: "Modo de edição de Missão",
                        content: "mission/edit/" + mission_id,
                        buttons: "<button class='btn btn-rpg btn-silver mr-1' value='delete'>Excluir</button><button class='btn btn-rpg btn-green' value='save'>Salvar</button>"
                    }).on("click", function(e) {
                        let formData = new FormData(modal.content.find(form_mission)[0])
                        if(e.target.value === "save") {
                            if(saveData("mission/update", formData)) {
                                modal.close();
                            }
                            $(".content").load("mission/list", function() {
                                loading.hide()
                            })
                        } else if(e.target.value === "delete") {
                            modal.confirm({
                                title: "Modo de Exclusão",
                                message: "Deseja realmente excluir esta MISSÂO?"
                            }).on("click", function(i) {
                                if(i.target.value === "1") {
                                    let id = modal.content.find("[name=id]").val()
                                    $.ajax({
                                        url: "mission/delete",
                                        type: "POST",
                                        dataType: "JSON",
                                        data: {
                                            id
                                        },
                                        beforeSend: function() {
                                            loading.show()
                                        },
                                        success: function(response) {
                                            alertLatch("Mission removed successfully", "var(--cor-success)")
                                            modal.close()
                                            $(".content").load("mission/list", function() {
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
                    alertLatch("No selected mission", "var(--cor-warning)")
                }
                break
            default:
                loading.hide()
        }
    }

    if(typeof(list) !== "undefined") {
        list.querySelector(".left").onclick = (e) => {
            if(typeof(e.target.attributes["data-id"]) !== "undefined") {
                let id = e.target.attributes["data-id"].value
                let name = e.target.innerText
                let mission = loadData("mission/load/" + name)
                let personages = loadData("mission/personages/" + name)
                story.innerText = mission.story

                let html = ""
                for(let i in personages) {
                    html += "<div><i class='fa fa-circle mr-2' style='font-size: .8em'></i>" + personages[i] + "</div>"
                }
                personage.innerHTML = html
                $.ajax({
                    url: "map/load",
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        id
                    },
                    beforSend: function() {
                        loading.show()
                    },
                    success: function(response) {
                        $(images).removeClass("slick-initialized slick-slider")
                        let imgs = ""
                        for(let i in response) {
                            imgs += "<img data-id='" + response[i] + "' src='image/id/" + response[i] + "' alt='' height='280px' />"
                        }
                        images.innerHTML = imgs;
                        if(!$(images).hasClass("slick-initialized slick-slider")) {
                            $(images).slick({
                                fade: true
                            })
                        }
                    },
                    error: function(error) {
                        console.log(error)
                    },
                    complete: function() {
                        loading.hide()
                    }
                })

                /** Maps */
                list.querySelector(".right").onclick = (e) => {
                    if(typeof(e.target.attributes["data-id"]) !== "undefined") {
                        let image_id = e.target.attributes["data-id"].value
                        modal.show({
                            title: "Edição de Mapa",
                            content: "map/edit",
                            params: {
                                image_id
                            },
                            buttons: "<button class='btn btn-rpg btn-silver' value='delete' >Excluir</button><button class='btn btn-rpg btn-info' value='add' >Adicionar</button><button class='btn btn-rpg btn-danger' value='save' >Salvar</button>"
                        }).on("click", function(e) {
                            let btnName = e.target.value
                            let formData = new FormData(form_map)
                            formData.append("id", image_id)
                            if(btnName === "save") {
                                if(formData.get("image")["name"] === "") {
                                    return alertLatch("No file was added", "var(--cor-warning)")
                                } else if(saveData("image/save", formData)) {
                                    window.location.reload()
                                }
                            } else if(btnName === "delete") {
                                modal.confirm({
                                    title: "Esclusão de mapa",
                                    message: "Deseja realmente escluir este mapa?"
                                }).on("click", function(e) {
                                    if(e.target.value == 1) {
                                        $.ajax({
                                            url: "image/delete/id/" + image_id,
                                            type: "POST",
                                            dataType: "JSON",
                                            beforeSend: function() {
                                                loading.show()
                                            },
                                            success: function(response) {
                                                alertLatch(response, "var(--cor-success)")
                                                modal.close()
                                                $(".content").load("mission/list", function() {
                                                    loading.hide()
                                                })
                                            },
                                            error: function(error) {
                                                console.log(error)
                                            },
                                            complete: function() {
                                                loading.hide()
                                            }
                                        })
                                    }
                                })
                            } else {
                                let nameMission = list.querySelector(".left button.active").innerText
                                addMap(nameMission)
                            }
                        })
                    } else {
                        if(list.querySelector(".right img") === null) {
                            let nameMission = list.querySelector(".left button.active").innerText
                            addMap(nameMission)
                        }
                    }
                }
            }
        }
    }

    /** Keep actived the button */
    $(".btn-oval").on("click", function() {
        $(".btn-oval").removeClass("active")
        $(this).addClass("active")
    })
</script>
