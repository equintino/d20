import AbstractControllers from "./abstractcontrollers.js"

export default class Character extends AbstractControllers {
    constructor(cls) {
        super(cls)
    }

    optInit(btnName) {
        this.view.loading.show()
        if (btnName === 'new') {
            this.showPage('character/add', (elem) => {
                this.setButton(elem)
                this.view.changeCategory((formData) => {
                    let list = this.openFile('avatar', formData)
                    formData.append('act', 'list')
                    formData.append('response', list)
                    this.#setModal(formData, list)
                })
            })
        }

        if (btnName === 'list') {
            this.showPage('character/list', (elem) => {
                this.setButton(elem, (btnActive, e) => {
                    let btnName = e.target.value
                    if (btnName !== 'edit' && btnName !== 'back') {
                        if (btnActive !== null) btnActive.classList.remove('active')
                        e.target.classList.add('active')
                    }
                })
            })
        }
    }

    #setModal(formData, list) {
        this.openModal('avatar/show', formData, () => {
            this.view.carousel('#imageAvatar', list, (data) => {
                this.view.imgSelected('#avatarList', data.idImage)
            })
            this.view.eventInModal('#avatarList', 'change', (formData) => {
                this.view.loading.show()
                this.view.carousel('#imageAvatar', this.openFile('avatar', formData), (data) => {
                    this.view.imgSelected('#avatarList', data.idImage)
                    this.view.loading.hide()
                })
                let category = this.openFile(`category/id/${formData.get('idCategory')}`)
                this.view.updateCategory('#avatarList', category)
            })

            this.view.setBtnModal('<button class="btn btn-rpg btn-danger" value="selected">Selecionar</button>', (e, form) => {
                let btnName = e.target.value
                if (btnName === 'selected') {
                    this.view.avatarSelected(form, (e) => {
                        this.view.changeAvatar((formData) => {
                            let list = this.openFile('avatar', formData)
                            formData.append('act', 'list')
                            formData.append('response', list)
                            this.#setModal(formData, list)
                        })
                    })
                    this.view.closeModal(() => {
                        /** The short story */
                        this.openModal('character/story', {}, (elem) => {
                            this.view.setFocus(elem, '[name=story]')
                            this.view.setBtnModal('<button class="btn btn-rpg btn-silver" value="reset">Limpar</button><button class="btn btn-rpg btn-danger" value="save">Salvar</button>', (e, form) => {
                                let btnName = e.target.value
                                if (btnName === 'save') {
                                    this.view.setStory(form)
                                    this.view.closeModal()
                                }
                            })
                        })
                    })
                }
            })
            this.view.loading.hide()
        })
    }

    btnAction(btn) {
        switch (btn.value) {
            case 'back':
                this.btnBack('character')
                break
            case 'clear':
                this.btnClean('#character')
                break
            case 'save':
                this.#submit()
                break
            case 'breed':
                this.view.carousel('#avatar', this.openFile('breed/list'), (e) => {
                    this.view.setDetails(e)
                    this.view.loading.hide()
                })
                break
            case 'edit':
                this.#edition()
                break
            default:
                this.#btnCharacter(btn)
        }
    }

    #submit() {
        this.view.submit('#character form', (formData, validate) => {
            let resp
            if (validate) {
                resp = this.service.save('character/save', formData)
                if (resp.indexOf('success') !== -1) {
                    this.btnClean('#character')
                    this.view.removeAvatarSelected()
                }
            } else {
                resp = "<span class='warning'>This field is necessary!!!</span>"
            }
            this.message(resp)
            this.view.loading.hide()
        })
    }

    #btnCharacter(btn) {
        this.view.setBtnCharacter(btn,  (data) => {
            if (data.idCategory !== '') this.view.setCategory(this.openFile(`category/id/${data.idCategory}`))
            if (data.idBreed !== '') this.view.setBreed(this.openFile(`breed/id/${data.idBreed}`))
            if (data.idMission !== '') {
                this.view.setMission(this.openFile(`mission/id/${data.idMission}`))
            } else {
                this.view.setMission(false)
            }
        })
    }

    #edition() {
        const resp = this.view.edition()
        if (typeof(resp) === 'undefined') return

        this.openModal('character/edit', resp, () => {
            let buttons = "<button class='btn btn-rpg btn-silver' value='delete'>Excluir</button>"
                + "<button class='btn btn-rpg btn-danger' value='save'>Salvar</button>"
            this.view.setBtnModal(buttons, (e, form) => {
                let btnName = e.target.value
                if (btnName === "delete") {
                    alert('excluir')
                    // modal.confirm({
                    //     title: "Modo de Exclusão de Personagem",
                    //     message: "Deseja realmente escluir este personagem?"
                    // })
                    // .on("click", function(i) {
                    //     if (i.target.value === "1") {
                    //         let id = modal.content.find("[data-id]").attr("data-id")
                    //         $.ajax({
                    //             url: "character/delete",
                    //             type: "POST",
                    //             dataType: "JSON",
                    //             data: {
                    //                 id
                    //             },
                    //             beforeSend: function() {
                    //                 loading.show()
                    //             },
                    //             success: function(response) {
                    //                 alertLatch("Personage removed successfully", "va(--cor-success)")
                    //                 modal.hideContent()
                    //                 $(".content").load("character/list", () => {
                    //                     act.list(character)
                    //                     loading.hide()
                    //                 })
                    //             },
                    //             error: function(error) {
                    //             },
                    //             complete: function() {
                    //                 loading.hide()
                    //             }
                    //         })
                    //     }
                    // })
                } else if (btnName === "save") {
                    this.view.submit('#myCharacter', (formData, validate) => {
                        if (validate) {
                            this.openFile('character/update', formData)
                            this.view.closeModal()
                        }
                    })
                    this.optInit('list')
                }
            })
            this.view.loading.hide()
        })

        return
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

        return act
    }
}