var scriptMission = (id) => {
    const act = {
        btnName: mission.onclick,
        startLoading: () => {
            loading.show()
        },
        stopLoading: () => {
            loading.hide()
        },
        new: (e) => {
            mission.onclick = (e) => {
                this.btnName = e.target.value
                if (btnName !== "" && typeof(btnName) !== "undefined") loading.show()
                act.options(btnName)
            }
        },
        list: () => {
            mission.onclick = (e) => {
                this.btnName = e.target.value
                act.options(btnName)
            }
            list.querySelectorAll(".left fieldset div button").forEach((key,value) => {
                key.onclick = (i) => {
                    act.left(i)
                }
            })
            /** Keep actived the button */
            mission.querySelectorAll(".btn-oval").forEach((e) => {
                e.addEventListener("click", () => {
                    act.startLoading()
                    if (mission.querySelector(".active") !== null) {
                        mission.querySelector(".active").classList.remove("active")
                    }
                    e.classList.add("active")
                })
            })
        },
        options: (btnName) => {
            act.startLoading()
            switch (btnName) {
                case "back":
                $(".content").load("mission/init", function() {
                    loading.hide()
                    scriptMission(init)
                })
                break
                case "clear":
                    form_mission.reset()
                    loading.hide()
                    break
                case "save":
                    let formData = new FormData(form_mission)
                    let link = "mission/save"
                    for (let pair of formData.entries()) {
                        if (pair[1] === "") {
                            let field = form_mission.querySelector("[name=" + pair[0] + "]")
                            field.style.background = "pink"
                            field.style.color = "black"
                            $(field).trigger("focus")
                            loading.hide()
                            return alertLatch("fill in this field", "var(--cor-warning)")
                        }
                    }
                    if (saveData(link, formData)) {
                        let nameMission = formData.get("name")
                        /** Clear form */
                        form_mission.reset()
                        act.addMap(nameMission)
                    }
                    break
                case "include":
                    /** Request into a mession */
                    if (list.querySelector("button.active") !== null) {
                        loading.show()
                        let mission_id = list.querySelector(".left button.active").attributes["data-id"].value
                        modal.show({
                            title: "Selecione o seu personagem",
                            content: "missionRequest/init",
                            params: { mission_id },
                            buttons: "<button class='btn btn-rpg btn-green' value='save'>Enviar</button>"
                        })
                        .on("click", (e) => {
                            let formData = new FormData(modal.content.find(form_mission)[0])
                            if (e.target.value === "save") {
                                let character_id = formData.get("character_id")
                                if (character_id === null) {
                                    return alertLatch("No selected character", "var(--cor-warning)")
                                }
                                if (saveData("missionRequest/request", formData)) {
                                    modal.hideContent();
                                }
                            }
                        })
                    } else {
                        loading.hide()
                        alertLatch("No selected mission", "var(--cor-warning)")
                    }
                    break
                case "edit":
                    if (list.querySelector("button.active") !== null) {
                        let mission_id = list.querySelector(".left button.active").attributes["data-id"].value
                        modal.show({
                            title: "Modo de edição de Missão",
                            content: "mission/edit/" + mission_id,
                            buttons: "<button class='btn btn-rpg btn-silver mr-1' value='delete'>"
                                + "Excluir</button><button class='btn btn-rpg btn-green' "
                                + "value='save'>Salvar</button>"
                        })
                        .on("click", function(e) {
                            let formData = new FormData(modal.content.find(form_mission)[0])
                            if (e.target.value === "save") {
                                if (saveData("mission/update", formData)) {
                                    modal.hideContent();
                                }
                                $(".content").load("mission/list", function() {
                                    act.list()
                                    loading.hide()
                                })
                            } else if (e.target.value === "delete") {
                                if (modal.content.find("#personage td").text().length !== 0) {
                                    return alertLatch("This mission is happing", "var(--cor-warning)")
                                }
                                modal.confirm({
                                    title: "Modo de Exclusão",
                                    message: "Deseja realmente excluir esta MISSÂO?"
                                })
                                .on("click", function(i) {
                                    if (i.target.value === "1") {
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
                                                modal.hideContent()
                                                $(".content").load("mission/list", function() {
                                                    act.list()
                                                    loading.hide()
                                                })
                                            },
                                            error: function(error) {
                                                alertLatch(error.responseText)
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
        },
        left: (e) => {
            let id = e.target.attributes["data-id"].value
            let mission = loadData("mission/id/" + id)
            personage.innerHTML = act.personages(mission.name)
            story.innerText = mission.story
            act.maps(mission.id)
        },
        midle: (e) => {
            let btnActive = list.querySelector(".left button.active")
            let image_id = e.target.attributes["data-id"].value
            let groupName = btnActive.attributes["data-groupname"].value.toLowerCase()

            /** limiting in the access */
            if (btnActive.attributes["data-access"].value.indexOf("*") === -1 && groupName !== "mestre") {
                return
            }
            modal.show({
                title: "Edição de Mapa",
                content: "map/edit",
                params: {
                    image_id
                },
                buttons: "<button class='btn btn-rpg btn-silver' value='delete'>"
                    + "Excluir</button><button class='btn btn-rpg btn-info' "
                    + "value='add'>Adicionar</button>"
                    + "<button class='btn btn-rpg btn-danger' value='save'>Salvar</button>"
            })
            .on("click", function(e) {
                let btnName = e.target.value
                let formData = new FormData(form_map)
                formData.append("id", image_id)
                if (btnName === "save") {
                    if (formData.get("image")["name"] === "") {
                        return alertLatch("No file was added", "var(--cor-warning)")
                    } else if (saveData("image/save", formData)) {
                        document.location.reload()
                    }
                } else if (btnName === "delete") {
                    modal.confirm({
                        title: "Esclusão de mapa",
                        message: "Deseja realmente escluir este mapa?"
                    })
                    .on("click", function(e) {
                        if (e.target.value == 1) {
                            $.ajax({
                                url: "image/delete/id/" + image_id,
                                type: "POST",
                                dataType: "JSON",
                                beforeSend: function() {
                                    loading.show()
                                },
                                success: function(response) {
                                    alertLatch(response, "var(--cor-success)")
                                    modal.hideContent()
                                    $(".content").load("mission/list", function() {
                                        act.list()
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
                    let missionId = list.querySelector(".left button.active").attributes["data-id"].value
                    act.addMap(missionId)
                }
            })
        },
        personages: (mission) => {
            let personages = loadData("mission/personages/" + mission.replace(/ /g,'_'), null, "JSON", "loading...",
                "This mission no has personages")

            let html = ""
            for (let i in personages) {
                html += "<div><i class='fa fa-circle mr-2' style='font-size: .8em'></i>" + personages[i] + "</div>"
            }
            return html
        },
        maps: (id) => {
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
                    for (let i in response) {
                        imgs += "<img data-id='" + response[i] + "' src='image/id/" + response[i]
                            + "' alt='' height='280px' />"
                    }
                    images.innerHTML = imgs;
                    activeSlick(images)
                },
                error: function(error) {
                    console.log(error)
                },
                complete: function() {
                    loading.hide()
                }
            })
            /** Maps */
            list.querySelector(".midle").onclick = (e) => {
                if (typeof(e.target.attributes["data-id"]) !== "undefined") {
                    act.midle(e)
                } else {
                    if (list.querySelector(".midle img") === null) {
                        let missionId = list.querySelector(".left button.active").attributes["data-id"].value
                        act.addMap(missionId)
                    }
                }
            }
        },
        addMap: (missionId) => {
            $.ajax({
                url: "mission/id/" + missionId,
                type: "POST",
                dataType: "JSON",
                data: {
                    missionId
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
                        buttons: "<button class='btn btn-rpg btn-silver' value='clear'>Limpar"
                            + "</button><button class='btn btn-rpg btn-danger' value='save'>Salvar</button>"
                    })
                    .on("click", function(i) {
                        loading.show()
                        let btnName = i.target.value
                        let formData = new FormData(form_map)
                        formData.append("mission_id",response["id"])
                        if (btnName === "save") {
                            for (const pair of formData.entries()) {
                                if (pair[1] === "") {
                                    loading.hide()
                                    return alertLatch("There are empty fields", "var(--cor-warning)")
                                }
                                if (pair[0] === "image" && pair[1].name === "") {
                                    loading.hide()
                                    return alertLatch("No map included", "var(--cor-warning)")
                                }
                            }
                            if (saveData("map/save", formData)) {
                                let lenMap = form_map.length
                                for (let i=0; i < lenMap; i++) {
                                    form_map[i].value = ""
                                }
                                thumb_image.src = "#"
                            }
                            loading.hide()
                        } else {
                            let lenMap = form_map.length
                            for (let i=0; i < lenMap; i++) {
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
    }
    id.onclick = (e) => {
        loading.show()
        let btnName = e.target.value
        if (btnName === "new") {
            $(".content").load("mission/add", function() {
                loading.hide()
                act.new()
            })
        } else if (btnName === "list") {
            $(".content").load("mission/list", function() {
                loading.hide()
                act.list()
            })
        }
    }
}
