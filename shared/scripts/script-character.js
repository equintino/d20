function scriptCharacter() {
    const act = {
        startLoading: () => {
            loading.show()
        },
        stopLoading: () => {
            loading.hide()
        },
        new: (idName) => {
            act.slickScript().avatar()
            idName.onclick = (e) => {
                e.preventDefault()
                act.startLoading()
                switch (e.target.value) {
                    case "back":
                        act.optionBack()
                        break
                    case "clear":
                        act.optionClear()
                        break
                    case "breed":
                        act.optionBreed()
                        break
                    case "save":
                        act.optionSave(myCharacter)
                        break
                    default:
                        act.stopLoading()
                }
            }
            return act
        },
        list: (idName) => {
            act.btnSelected(idName)
            idName.onclick = (e) => {
                act.startLoading()
                switch (e.target.value) {
                    case "back":
                        act.optionBack()
                        break
                    case "edit":
                        act.optionEdit()
                        break
                    default:
                        act.stopLoading()
                }
            }
            return act
        },
        slickScript: () => {
            $('.single-item').slick({
                fade: true,
                infinite: true,
                dots: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: false,
                autoplay: false,
                variableWidth: false,
                adptiveHeight: false
            })
            return act
        },
        optionBack: () => {
            $(".content").load("character", () => {
                callScript("character")
                act.stopLoading()
            })
            return act
        },
        optionClear: () => {
            $(".content").load("character/add", () => {
                act.new(character).stopLoading()
            })
            return act
        },
        optionBreed: () => {
            avatar.querySelectorAll(".galery div").forEach((e) => {
                e.style.display = "block"
            })
            let listAvatar = avatar.querySelector(".single-item")
            let details = () => {
                let breed = $(".single-item img[aria-hidden=false]").attr("alt")
                let breed_id = $(".single-item img[aria-hidden=false]").attr("data-id")
                let detail = $(".single-item img[aria-hidden=false]").attr("data-description")
                $(".breed").closest("div").append("<input type='hidden' name='breed_id' value='"
                    + breed_id + "' />")
                $("#breed, .breed").text(breed.toUpperCase())
                $(description).find("p").text(detail)
            }
            listAvatar.addEventListener("click", () => {
                details()
            })
            listAvatar.addEventListener("keydown", () => {
                details()
            })
            $(".slick-next").trigger("click")
            details()
            return act
        },
        optionSave: (form) => {
            if (!form.reportValidity()) {
                act.stopLoading()
                return alertLatch("Fill this field", "var(--cor-warning)")
            }
            let formData = new FormData(form)
            modal.show({
                title: "Descreva a história do seu personagem",
                content: "character/story",
                buttons: "<button class='btn btn-rpg btn-silver' value='0'>"
                    + "Limpar</button><button class='btn btn-rpg btn-danger' value='save'>"
                    + "Salvar</button>"
            })
            .on("click", (i) => {
                let story = modal.content.children().find("[name=story]").val()
                if (i.target.value == "save") {
                    if (story.trim().length === 0) {
                        return alertLatch("No story has been identified", "var(--cor-warning)")
                    }
                    formData.append("story", story)
                } else {
                    let textStory = form_story.querySelector("textarea")
                    textStory.value = ""
                    textStory.focus()
                    return
                }
                if (saveData("character/save", formData)) {
                    $(".content").load("character/add", () => {
                        act.new(character)
                        loading.hide()
                    })
                    modal.hideContent()
                }
            })
            loading.hide()
            return act
        },
        optionEdit: () => {
            let btnActive = $(list.querySelector(".left")).find("button.active")
            let id = btnActive.attr("data-id")
            let image_id = btnActive.attr("data-image_id")
            let breed_id = btnActive.attr("data-breed_id")
            let category_id = btnActive.attr("data-category_id")
            let story = btnActive.attr("data-story")
            let mission = btnActive.attr("data-mission")
            if (mission !== "") {
                loading.hide()
                return alertLatch("This character is on a mission", "var(--cor-warning)")
            }
            let params = {
                id,
                image_id,
                breed_id,
                category_id,
                story
            }
            if (btnActive.length === 0) {
                loading.hide()
                return alertLatch("Select a character","var(--cor-warning)")
            }

            let title = "Modo de edição de PERSONAGEM"
            let content = "character/edit"
            let buttons = "<button class='btn btn-rpg btn-silver' value='delete'>Excluir</button>"
                + "<button class='btn btn-rpg btn-danger' value='save'>Salvar</button>"
            let editCharacter = modal.show({title, content, params, buttons})
            editCharacter.event("change", (e) => {
                if ((e.target.name === "breed_id" || e.target.name === "category_id") && typeof(edit_character) !== "undefined") {
                    let breedId = edit_character.querySelector("[name=breed_id").value
                    let categoryId = edit_character.querySelector("[name=category_id").value
                    if (e.target.name === "breed_id") {
                        breedId = e.target.value
                    }
                    if (e.target.name === "category_id") {
                        categoryId = e.target.value
                    }
                    let list = act.getAvatarList(breedId, categoryId)
                    let title = "Escolha seu Avatar"
                    let content = "avatar/show"
                    let buttons = "<button class='btn btn-rpg btn-silver' value='close'>Fechar"
                        + "</button><button class='btn btn-rpg btn-danger' value='select'>"
                        + "Selecionar</button>"
                    let callback = () => {
                        scriptAvatarList()
                    }
                    let params = {
                        act: "list",
                        response: list,
                        breedId,
                        categoryId
                    }
                    let avatarSelected = modal.modal({title, content, params, buttons, callback})
                    avatarSelected.buttons.find("button").on("click", (e) => {
                        if (e.target.value === "select") {
                            let src = avatarList.querySelector(".slick-list img[aria-hidden=false]").src
                            let image_id = src.split("/").pop()
                            breedId = avatarList.querySelector("[name=breed]").value
                            categoryId = avatarList.querySelector("[name=class]").value
                            edit_character.querySelector("[name=breed_id").value = breedId
                            edit_character.querySelector("[name=category_id").value = categoryId
                            edit_character.querySelector("[name=image_id").value = image_id
                            avatar.querySelector("img").src = src
                            avatar.querySelector("img")["data-image_id"] = image_id
                            modal.hideContent()
                            editCharacter.buttons[0].querySelector("button").innerText = "Fechar"
                            editCharacter.buttons[0].querySelector("button").value = "close"
                        }
                        if (e.target.value === "close") {
                            modal.hideContent()
                        }
                    })
                }
            })
            editCharacter.buttons.find("button").on("click", (e) => {
                let btnName = e.target.value
                if (btnName === "delete") {
                    modal.confirm({
                        title: "Modo de Exclusão de Personagem",
                        message: "Deseja realmente escluir este personagem?"
                    })
                    .on("click", function(i) {
                        if (i.target.value === "1") {
                            let id = modal.content.find("[data-id]").attr("data-id")
                            $.ajax({
                                url: "character/delete",
                                type: "POST",
                                dataType: "JSON",
                                data: {
                                    id
                                },
                                beforeSend: function() {
                                    loading.show()
                                },
                                success: function(response) {
                                    alertLatch("Personage removed successfully", "var(--cor-success)")
                                    modal.hideContent()
                                    $(".content").load("character/list", () => {
                                        act.list(character)
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
                } else if (btnName === "save") {
                    let formData = new FormData(myCharacter)
                    if (saveData("character/update", formData)) {
                        $(".content").load("character/list", () => {
                            act.list(character)
                        })
                        modal.hideContent()
                    }
                } else {
                    modal.hideContent()
                }
            })
            return act
        },
        avatar: () => {
            let avatarList = avatar.querySelector(".single-item")
            myClass.onchange = (e) => {
                act.startLoading()
                let breedId = $(myCharacter).find(".single-item img[aria-hidden=false]").attr("data-id")
                let categoryId = e.target.value
                if (avatarList.style["display"] === "") {
                    myClass.value = ""
                    $(myBreed).trigger("click")
                    return alertLatch("Choose the breed first", "var(--cor-warning)")
                }
                let list = act.getAvatarList(breedId, categoryId)
                let title = "Escolha seu Avatar"
                let content = "avatar/show"
                let params = {
                    act: "list",
                    response: list,
                    breedId,
                    categoryId
                }
                let buttons = "<button class='btn btn-rpg btn-danger' value='1'>Selecionar</button>"
                let callback = () => {
                    scriptAvatarList()
                }
                let avatarSelected = modal.show({title, content, params, buttons, callback})
                avatarSelected.buttons.find("button").on("click", (e) => {
                    if (e.target.value == 1) {
                        let src = imageAvatar.querySelector("img[aria-hidden=false]").src
                        let imageId = src.split("/").pop()
                        avatar.querySelectorAll("div").forEach((e) => {
                            e.outerHTML = ""
                        })
                        avatar.innerHTML = "<img src='" + src + "' alt='' /><input type='hidden'"
                            + " name='image_id' value='" + imageId + "' />"
                        let category = modal.content.find("[name=class] :selected").text().toUpperCase()
                        let categoryId = modal.content.find("[name=class] :selected").val()
                        let breed = modal.content[0].querySelector("[name=breed] option[selected]").innerText
                        let breedId = modal.content[0].querySelector("[name=breed]").value
                        $(myClass).closest("div").append("<input type='hidden' name='category_id'"
                            + " value='" + categoryId + "' />")
                        $(myClass).parent().text(category)
                        myCharacter.querySelector(".breed").innerText = breed.toUpperCase()
                        myCharacter.querySelector("[name=breed_id]").value = breedId
                        myCharacter.querySelector("#myBreed").disabled = true
                        myCharacter.querySelector("#myBreed").style = "color: black"
                        myCharacter.querySelector("#description p").innerText = modal.content.find("[name=breed] :selected").attr("data-description")
                        avatarSelected.hideContent()
                    }
                })
            }
            return act
        },
        getAvatarList: (breedId, categoryId) => {
            let data
            $.ajax({
                url: "avatar",
                type: "POST",
                dataType: "JSON",
                data: {
                    breedId,
                    categoryId
                },
                async: false,
                beforeSend: function() {
                },
                success: function(response){
                    if (typeof(response) === "string") {
                        return alertLatch(response, "var(--cor-warning)")
                    }
                    data = response
                },
                error: function(error) {
                },
                complete: function(data) {
                }
            })
            return data
        },
        modalShow: (title, content, params, buttons, callback, modalName) => {
            return modal.modalName({
                title: title,
                content: content,
                params: params,
                buttons: buttons,
                callback: callback
            })
        },
        btnSelected: (idName) => {
            idName.querySelectorAll(".left button").forEach((e) => {
                e.onclick = (i) => {
                    act.startLoading()
                    $(idName).find(".left .active").removeClass("active")
                    i.target.classList.add("active")

                    let id = i.target.attributes["data-id"].value
                    let image_id = i.target.attributes["data-image_id"].value
                    let breed_id = i.target.attributes["data-breed_id"].value
                    let category_id = i.target.attributes["data-category_id"].value
                    let resume = i.target.attributes["data-story"].value
                    let mission_id = i.target.attributes["data-mission"].value

                    /** Loading Breed */
                    $.ajax({
                        url: "breed/id/" + breed_id,
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            id: breed_id
                        },
                        beforSend: function() {

                        },
                        success: function(response) {
                            detail_breed.innerHTML = "<img src='image/id/" + response.image_id
                                + "' alt='' height='100px' title='" + response.name + "'/>"
                        },
                        error: function(error) {
                            console.log(error)
                        },
                        complete: function() {
                            act.stopLoading()
                        }
                    })

                    /** Loading Class */
                    $.ajax({
                        url: "category/id/" + category_id,
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            id: category_id
                        },
                        beforSend: function() {
                            act.startLoading()
                        },
                        success: function(response) {
                            detail_class.innerHTML = "<img src='image/id/" + response.image_id
                                + "' alt='' height='50px' title='" + response.name + "'/>"
                        },
                        error: function(error) {
                            console.log(error)
                        },
                        complete: function() {
                            act.stopLoading()
                        }
                    })

                    let waiting = "<img class='schedule' src='themes/template/assets/img/loading.png' alt='' height='30px' />"
                    if(mission_id !== "") {
                        /** Loading Mission */
                        list.querySelector(".breed_class p").innerHTML = waiting
                        $.ajax({
                            url: "mission/id/" + mission_id,
                            type: "POST",
                            dataType: "JSON",
                            beforSend: function() {
                            },
                            success: function(response) {
                                list.querySelector(".breed_class p").innerHTML = "<textarea class='input-rpg'"
                                    + "disabled >" + response.name + "</textarea>"
                            },
                            error: function(error) {
                            },
                            complete: function() {
                            }
                        })
                    } else {
                        list.querySelector(".breed_class p").innerHTML = "Sem missão"
                    }

                    avatar.innerHTML = "<img data-id='" + id + "' src='image/id/" + image_id + "'"
                        + " alt='' height='400px'/>"
                    story.children[0].innerHTML = "<textarea rows='20' class='input-rpg' disabled>"
                        + resume + "</textarea>"
                }
            })
            return act
        }
    }
    init.onclick = (e) => {
        let btnName = e.target.value
        if (typeof(btnName) === "undefined" || btnName === "") {
            return
        }
        act.startLoading()
        switch (btnName) {
            case "new":
                $(".content").load("character/add", () => {
                    act.new(character).stopLoading()
                })
                break
            case "list":
                $(".content").load("character/list", () => {
                    act.list(character).stopLoading()
                })
                break
            default:
        }
    }
}
