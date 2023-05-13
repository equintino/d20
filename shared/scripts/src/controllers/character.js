import AbstractControllers from "./abstractcontrollers.js"

export default class Character extends AbstractControllers {
    constructor(cls) {
        super(cls)
    }

    optInit(btnName) {
        this.view.loading.show()
        if (btnName === 'new') {
            this.showPage({
                page: 'character/add',
                fn: (elem) => {
                    this.setButton({ elem })
                    this.view.changeCategory({
                        fn: (formData) => {
                            let list = this.openFile({
                                page: 'avatar',
                                formData
                            })
                            formData.append('act', 'list')
                            formData.append('response', list)
                            this.#setModal({ formData, list })
                        }
                    })
                }
            })
        }

        if (btnName === 'list') {
            this.showPage({
                page: 'character/list',
                fn: (elem) => {
                    this.setButton({
                        elem,
                        fn: (data) => {
                            let btnName = data.e.target.value
                            if (btnName !== 'edit' && btnName !== 'back') {
                                if (data.btnActive !== null) data.btnActive.classList.remove('active')
                                data.e.target.classList.add('active')
                            }
                        }
                    })
                }
            })
        }
    }

    #setModal({ formData, list }) {
        this.openModal({
            page: 'avatar/show',
            formData: formData,
            fn: () => {
                this.view.carousel({
                    idElement: '#imageAvatar',
                    list: list,
                    fn: (data) => {
                        this.view.imgSelected({
                            idElement: '#avatarList',
                            idImage: data.idImage
                        })
                    }
                })
                this.view.eventInModal({
                    idElement: '#avatarList',
                    event: 'change',
                    fn: ({ formData }) => {
                        this.view.loading.show()
                        this.view.carousel({
                            idElement: '#imageAvatar',
                            list: this.openFile({
                                page: 'avatar',
                                formData
                            }),
                            fn: (data) => {
                                this.view.imgSelected({
                                    idElement: '#avatarList',
                                    idImage: data.idImage
                                })
                                this.view.loading.hide()
                            }
                        })
                        let category = this.openFile({ page: `category/id/${formData.get('category_id')}` })
                        this.view.updateCategory({
                            idElement: '#avatarList',
                            category
                        })
                    }
                })

                this.view.setBtnModal({
                    buttons: '<button class="btn btn-rpg btn-danger" value="selected">Selecionar</button>',
                    fn: (e, form) => {
                        let btnName = e.target.value
                        if (btnName === 'selected') {
                            this.view.avatarSelected({
                                form,
                                fn: (e) => {
                                    this.view.changeAvatar({
                                        fn: (formData) => {
                                            let list = this.openFile({ page: 'avatar', formData })
                                            formData.append('act', 'list')
                                            formData.append('response', list)
                                            this.#setModal({ formData, list })
                                        }
                                    })
                                }
                            })
                            this.view.closeModal({
                                fn: () => {
                                    /** The short story */
                                    this.openModal({
                                        page: 'character/story',
                                        formData: {},
                                        fn: (elem) => {
                                            this.view.setFocus({
                                                elem,
                                                property: '[name=story]'
                                            })
                                            this.view.setBtnModal({
                                                buttons: '<button class="btn btn-rpg btn-silver" value="reset">Limpar</button><button class="btn btn-rpg btn-danger" value="save">Salvar</button>',
                                                fn: (e, form) => {
                                                    let btnName = e.target.value
                                                    if (btnName === 'save') {
                                                        this.view.setStory({ form })
                                                        this.view.closeModal()
                                                    }
                                                }
                                            })
                                        }
                                    })
                                }
                            })
                        }
                    }
                })
                this.view.loading.hide()
            }
        })
    }

    btnAction({ btn }) {
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
                this.view.carousel({
                    idElement: '#avatar',
                    list: this.openFile({ page: 'breed/list' }),
                    fn: (e) => {
                        this.view.setDetails(e)
                        this.view.loading.hide()
                    }
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
        this.view.submit({
            form: '#character form',
            fn: ({ formData, validate }) => {
                let resp
                if (validate) {
                    resp = this.service.save({
                        page: 'character/save',
                        formData
                    })
                    if (resp.indexOf('success') !== -1) {
                        this.btnClean('#character')
                        this.view.removeAvatarSelected()
                    }
                } else {
                    resp = "<span class='warning'>This field is necessary!!!</span>"
                }
                this.message({ msg: resp })
                this.view.loading.hide()
            }
        })
    }

    #btnCharacter(btn) {
        this.view.setBtnCharacter(btn,  ({ idCategory, idBreed, idMission }) => {
            if (idCategory !== '') this.view.setCategory({
                category: this.openFile({ page: `category/id/${idCategory}` })
            })
            if (idBreed !== '') this.view.setBreed({
                breed: this.openFile({ page: `breed/id/${idBreed}` })
            })
            if (idMission !== '') {
                this.view.setMission({
                    mission: this.openFile({ page: `mission/id/${idMission}` })
                })
            } else {
                this.view.setMission({ mission: false })
            }
        })
    }

    #edition() {
        const resp = this.view.edition()
        if (typeof(resp) === 'undefined') return

        this.openModal({
            page: 'character/edit',
            formData: resp,
            fn: () => {
                let buttons = "<button class='btn btn-rpg btn-silver' value='delete'>"
                    + "Excluir</button><button class='btn btn-rpg btn-danger' value='save'>"
                    + "Salvar</button>"
                this.view.setBtnModal({
                    buttons,
                    fn: (e, form) => {
                        let btnName = e.target.value
                        if (btnName === "delete") {
                            let formData = new FormData(form)
                            this.view.openModal({
                                box: '#boxe2_main',
                                title: 'MODO DE EXCLUSÃO',
                                message: `Deseja realmente excluir este Personagem? (${formData.get('personage').toUpperCase()})`
                            })
                            let buttons2 = "<button class='btn btn-rpg btn-silver' "
                                + "value='no'>Não</button><button class='btn btn-rpg "
                                + "btn-danger' value='yes'>Sim</button>"
                            this.view.setBtnModal({
                                buttons: buttons2,
                                fn: (e, form) => {
                                    if (e.target.value === 'yes') {
                                        let resp = this.service.open('POST', 'character/delete', formData)
                                        if (resp.indexOf('success') !== -1) {
                                            this.view.closeAllModal()
                                            this.optInit('list')
                                            resp = 'Successful removed character'
                                        }
                                        this.message({ msg: resp })
                                    }
                                },
                                box: '#boxe2_main'
                            })
                        } else if (btnName === "save") {
                            this.view.submit({
                                form: '#myCharacter',
                                fn: ({ formData, validate }) => {
                                    if (validate) {
                                        this.openFile({ page: 'character/update', formData })
                                        this.view.closeModal()
                                    }
                                }
                            })
                            this.optInit('list')
                        }
                    }
                })
                this.view.eventInModal({
                    idElement: '#myCharacter',
                    event: 'change',
                    fn: ({ e, formData }) => {
                        let property = e.target.name
                        let idCategory = formData.get('category_id')
                        let idBreed = formData.get('breed_id')

                        formData.append('act', 'list')
                        // formData.append('list', this.openFile({
                        //     page: 'avatar',
                        //     formData
                        // }))
                        console.log(
                            this.openFile({
                                page: 'avatar',
                                formData
                            })
                        )
                        this.view.loading.show()

                        if(property === 'category_id' || property === 'breed_id') {
                            this.openModal({
                                page: 'avatar/show',
                                formData,
                                box: '#boxe2_main'
                            })
                        }
                        // this.view.carousel({
                        //     idElement: '#imageAvatar',
                        //     list: this.openFile({
                        //         page: 'avatar',
                        //         formData
                        //     }),
                        //     fn: (data) => {
                        //         this.view.imgSelected({
                        //             idElement: '#avatarList',
                        //             idImage: data.idImage
                        //         })
                        //         this.view.loading.hide()
                        //     }
                        // })
                        // let category = this.openFile({
                        //     page: `category/id/${formData.get('idCategory')}`
                        // })
                        // this.view.updateCategory({
                        //     idElement: '#avatarList',
                        //     category
                        // })
                    }
                })
                this.view.loading.hide()
            }
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