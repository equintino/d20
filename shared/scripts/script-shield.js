var scriptShield = () => {
    const act = {
        startLoading: () => {
            loading.show()
        },
        stopLoading: () => {
            loading.hide()
        },
        initButtons: () => {
            if (typeof(shield) !== 'undefined') {
                shield.querySelectorAll("button:not(fieldset > button)").forEach((e) => {
                    e.addEventListener("click", (i) => {
                        act.startLoading()
                        act.actionButton(i.target.value)
                    })
                })
                shield.querySelectorAll("fieldset > button").forEach((e) => {
                    e.onclick = (i) => {
                        let groupId = i.target.attributes["data-id"].value
                        if (shield.querySelector(".active") !== null) {
                            shield.querySelector(".active").classList.remove("active")
                        }
                        act.checkSelected(groupId)
                        i.target.classList.add("active")
                    }
                })
                act.check()
                let groupActive = shield.querySelector("fieldset button.active")
                if (groupActive !== null) {
                    act.checkSelected(groupActive.attributes["data-id"].value)
                }
            }
        },
        actionButton: (btnName) => {
            switch (btnName) {
                case "add":
                    act.add()
                    break
                case "save":
                    act.save()
                    break
                case "delete":
                    act.delete()
                    break
                default:
            }
        },
        check: () => {
            if (typeof(shield) !== 'undefined') {
                shield.querySelectorAll(".screen fieldset span").forEach((e) => {
                    let icon = e.querySelector("i")
                    icon.addEventListener("click", (i) => {
                        if (shield.querySelector(".group button.active") === null) {
                            return alertLatch("Select a group first", "var(--cor-warning)")
                        }
                        if (i.target.classList.contains("fa-times")) {
                            i.target.classList.replace("fa-times","fa-check")
                            i.target.style = "color: green"
                        } else {
                            i.target.classList.replace("fa-check", "fa-times")
                            i.target.style = "color: red"
                        }
                    })
                })
            }
        },
        checkSelected: (groupId) => {
            $.ajax({
                url: "group/access",
                type: "POST",
                dataType: "JSON",
                data: {
                    groupId
                },
                beforeSend: () => {
                    if (typeof(shield) !== 'undefined') {
                        act.startLoading()
                        shield.querySelectorAll(".screen fieldset span i").forEach((e) => {
                            e.classList.replace("fa-check", "fa-times")
                            e.style = "color: red"
                        })
                    }
                },
                success: (response) => {
                    if (typeof(shield) !== 'undefined') {
                        shield.querySelectorAll(".screen fieldset span").forEach((e) => {
                            let icon = e.querySelector("i")
                            let page = icon.attributes["data-page"].value
                            if (response.indexOf(page) !== -1) {
                                icon.classList.remove("fa-times")
                                icon.classList.add("fa-check")
                                icon.style = "color: green"
                            }
                        })
                    }
                },
                error: () => {

                },
                complete: () => {
                    act.stopLoading()
                }
            })
        },
        add: () => {
            modal.modal({
                title: "Adcionando Grupos",
                content: "group/add",
                buttons: "<button class='btn btn-silver btn-rpg' value='close'>Fechar</button>"
                    + "<button class='btn btn-rpg btn-danger' value='save'>Adcionar Grupo</button>",
                callback: () => {
                    modal.dialogue[0].querySelector("form [autofocus]").focus()
                    modal.dialogue.find("form").submit((e) => {
                        e.preventDefault()
                    })
                }
            })
            .on("click", (e) => {
                act.startLoading()
                let form = modal.dialogue[0].querySelector("form")
                if (e.target.value === "save") {
                    let formData = new FormData(form)
                    for (i of formData) {
                        if (i[1].trim() === "") {
                            form.querySelector("[name=" + i[0] + "]").focus()
                            return alertLatch("Please, fill this field", "var(--cor-warning)")
                        }
                    }
                    if (saveData("group/save", formData)) {
                        $(".content").load("shield", () => {
                            scriptShield()
                            modal.hideContent()
                        })
                    } else {
                        modal.mask.show()
                    }
                } else {
                    act.stopLoading()
                    modal.hideContent()
                    modal.mask.hide()
                }
            })
        },
        save: () => {
            let pages = new Array()
            let groupId = shield.querySelector(".group button.active").attributes["data-id"].value
            if (typeof(shield) !== 'undefined') {
                shield.querySelectorAll(".screen fieldset span i.fa-check").forEach((e) => {
                    pages.push(e.attributes["data-page"].value)
                })
            }
            $.ajax({
                url: "group/update",
                type: "POST",
                dataType: "JSON",
                data: {
                    pages,
                    groupId
                },
                beforeSend: () => {

                },
                success: (response) => {
                    alertLatch(response, "var(--cor-success)")
                },
                error: () => {

                },
                complete: () => {
                    act.stopLoading()
                }
            })
        },
        delete: () => {
            if (shield.querySelector(".group .active") === null) {
                act.stopLoading()
                return alertLatch("Select a group", "var(--cor-warning)")
            }
            let groupId = shield.querySelector(".group .active").attributes["data-id"].value
            let name = shield.querySelector(".group .active").innerText
            if (groupId == 1) {
                act.stopLoading()
                return alertLatch("Don't delete this group", "var(--cor-warning)")
            }
            modal.confirm({
                title: "Deseja realmente excluir este grupo?",
                message: "<strong>" + name + "</strong>",
                callback: () => {
                    act.stopLoading()
                }
            })
            .on("click", (e) => {
                if (e.target.value == 1) {
                    $.ajax({
                        url: "group/delete",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            groupId
                        },
                        beforeSend: () => {
                            loading.show()
                        },
                        success: (response) => {
                            alertLatch(response, "var(--cor-success)")
                            $(".content").load("shield", () => {
                                scriptShield()
                                modal.hideContent()
                                loading.hide()
                            })
                        },
                        error: (error) => {
                            console.log(
                                error
                            )
                        },
                        complete: () => {
                        }
                    })
                }
            })
        }
    }
    act.initButtons()
}
