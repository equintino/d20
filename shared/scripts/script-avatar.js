function scriptAvatar() {
    const act = {
        new: (i) => {
            $(i.querySelectorAll("button")).on("click", (e) => {
                let btnName = e.target.value
                act.options(btnName)
            })
            image.onchange = evt => {
                let links = thumbImage(image, thumb_image)
                $(thumb_image).append(links)
            }
        },
        list: (i) => {
            $(i.querySelectorAll("button")).on("click", (e) => {
                let btnName = e.target.value
                act.options(btnName)
            })
            let breedId
            let categoryId
            document.getElementById("breeds").onchange = (i) => {
                breedId = i.target.value
                act.avatarsShow(breedId, categoryId)
            }
            document.getElementById("categories").onchange = (i) => {
                categoryId = i.target.value
                act.avatarsShow(breedId, categoryId)
            }
        },
        options: (btnName) => {
            loading.show()
            switch (btnName) {
                case "back":
                    $(".content").load("avatar", function() {
                        scriptAvatar()
                        loading.hide()
                    })
                    break
                case "clear":
                    form_avatar.reset()
                    loading.hide()
                    break
                case "save":
                    let formData = new FormData(form_avatar)
                    for (let i of form_avatar) {
                        let field = i.attributes["required"]
                        if (typeof(field) !== "undefined" && i.value == "") {
                            $(i).trigger("focus").css({
                                background: "pink",
                                color: "black"
                            })
                            loading.hide()
                            return alertLatch("This field is needed", "var(--cor-warning)")
                        } else {
                            if (i.attributes["name"].value === "sex") {
                                if ($(form_avatar).find("[name=sex]:checked").length === 0) {
                                    loading.hide()
                                    return alertLatch("Select your character's sex", "var(--cor-warning)")
                                }
                            }
                        }
                    }
                    let getArrayUrl = form_avatar.action.split("/")
                    let link = getArrayUrl[getArrayUrl.length - 2] + "/" + getArrayUrl[getArrayUrl.length - 1]
                    if (saveData(link, formData)) {
                        form_avatar.reset()
                        $(thumb_image).find("*").remove()
                    }
                    break
                case "edit":
                    if (typeof(imageAvatar) !== "undefined") {
                        let id = $(imageAvatar).find(".slick-list img[aria-hidden=false]").attr("data-id")
                        modal.show({
                            title: "Modo de edição de AVATARES",
                            content: "avatar/edit",
                            params: {
                                id
                            },
                            buttons: "<button class='btn btn-rpg btn-silver mr-1' value='delete'>"
                                + "Excluir</button><button class='btn btn-rpg btn-green' value='save'>Salvar</button>"
                        })
                        .on("click", function(e) {
                            if (e.target.value === "save") {
                                let formData = new FormData($(e.target.offsetParent).find("form")[0])
                                if (saveData("avatar/save", formData)) {
                                    $(".content").load("avatar/list", function() {
                                        loading.hide()
                                    })
                                    modal.hideContent();
                                }
                            } else if (e.target.value === "delete") {
                                modal.confirm({
                                    title: "Modo de Exclusão",
                                    message: "Deseja realmente excluir este AVATAR?"
                                })
                                .on("click", function(i) {
                                    if (i.target.value === "1") {
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
                                                modal.hideContent()
                                                $(".content").load("avatar/list", function() {
                                                    act.list(this)
                                                    loading.hide()
                                                })
                                                .on(function(e) {
                                                    console.log(e)
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

            }
        },
        avatarsShow: (breedId, categoryId) => {
            $(".avatar").find("*").remove()
            if ($(breeds).find(":checked").length > 0 && $(categories).find(":checked").length > 0) {
                loading.show()
                $.ajax({
                    url: "avatar",
                    type: "POST",
                    dataType: "JSON",
                    cache: true,
                    data: {
                        breedId,
                        categoryId
                    },
                    beforeSend: function() {
                    },
                    success: function(response) {
                        if (typeof(response) === "string") {
                            return alertLatch(response, "var(--cor-warning)")
                        }
                        $(".avatar").load("avatar/show", {
                            response,
                            act: "list",
                            breedId,
                            categoryId
                        }, () => {
                            loading.hide()
                            $(".avatar").find("[name=class]").closest("section").remove()
                            $(breed_description).css("margin-top","-80px")
                            scriptAvatarList()
                        })
                    },
                    error: function(error) {
                    },
                    complete: function() {
                    }
                })
            }
        }
    }
    avatar.onclick = (e) => {
        let btnName = e.target.value
        switch (btnName) {
            case "new":
                $(".content").load("avatar/add", function() {
                    act.new(this)
                })
                break
            case "list":
                $(".content").load("avatar/list", function() {
                    act.list(this)
                })
                break
            default:
        }
    }
}
