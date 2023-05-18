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
                        fn: ({ formData }) => {
                            let list = this.getDataFile({
                                url: 'avatar',
                                formData
                            })
                            formData.append('act', 'list')
                            formData.append('list', list)
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
                            this.view.btnActive(data)
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
                            list: this.getDataFile({
                                url: 'avatar',
                                formData
                            }),
                            fn: ({idImage }) => {
                                this.view.imgSelected({
                                    idElement: '#avatarList',
                                    idImage: idImage
                                })
                                this.view.loading.hide()
                            }
                        })
                        let category = this.getDataFile({ url: `category/id/${formData.get('category_id')}` })
                        this.view.updateCategory({
                            idElement: '#avatarList',
                            category
                        })
                    }
                })

                this.view.setBtnModal({
                    buttons: '<button class="btn btn-rpg btn-danger" value="selected">Selecionar</button>',
                    fn: ({ e, form }) => {
                        let btnName = e.target.value
                        if (btnName === 'selected') {
                            this.view.avatarSelected({
                                form,
                                fn: (e) => {
                                    this.view.changeAvatar({
                                        fn: (formData) => {
                                            let list = this.openFile({ url: 'avatar', formData })
                                            formData.append('act', 'list')
                                            formData.append('list', list)
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
                                                fn: ({ e, form }) => {
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
        switch (btn.target.value) {
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
                    list: this.getDataFile({ url: 'breed/list' }),
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
                this.#btnCharacter(btn.target)
        }
    }

    #submit() {
        this.view.submit({
            form: '#character form',
            fn: ({ formData, validate }) => {
                let resp
                if (validate) {
                    resp = this.service.save({
                        url: 'character/save',
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
                category: this.getDataFile({ url: `category/id/${idCategory}` })
            })
            if (idBreed !== '') this.view.setBreed({
                breed: this.getDataFile({ url: `breed/id/${idBreed}` })
            })
            if (idMission !== '') {
                this.view.setMission({
                    mission: this.getDataFile({ url: `mission/id/${idMission}` })
                })
            } else {
                this.view.setMission({ mission: false })
            }
        })
    }

    #avatar({ formData }) {
        formData.append('act', 'list')
        formData.append('source', 'character')
        this.view.loading.show()

        this.openModal({
            page: 'avatar/show',
            formData,
            box: '#boxe2_main'
        })

        this.view.carousel({
            idElement: '#imageAvatar',
            list: this.getDataFile({
                url: 'avatar',
                formData
            }),
            fn: ({ idImage }) => {
                this.view.imgSelected({
                    idElement: '#avatarList',
                    idImage
                })
                this.view.loading.hide()
            }
        })
        let buttons = '<button class="btn btn-rpg btn-danger" value="selected">Selecionar</button>'
        this.view.setBtnModal({
            buttons: buttons,
            fn: ({ e, form }) => {
                if (e.target.value === 'selected') {
                    let idImage = form.querySelector('[name=image_id]').value
                    document.querySelector('#myCharacter [name=image_id]').value = idImage
                    document.querySelector('#myCharacter img').src = `image/id/${idImage}`
                    this.view.closeModal({
                        box: document.querySelector('#boxe2_main')
                    })
                }
            },
            box: '#boxe2_main'
        })
    }

    #setBtnModal() {
        let buttons = "<button class='btn btn-rpg btn-silver' value='delete'>"
            + "Excluir</button><button class='btn btn-rpg btn-danger' value='save'>"
            + "Salvar</button>"
        this.view.setBtnModal({
            buttons,
            fn: ({ e, form }) => {
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
                        fn: ({ e, form }) => {
                            if (e.target.value === 'yes') {
                                let resp = this.openFile({ url: 'character/delete', formData })
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
                                this.openFile({ url: 'character/update', formData })
                                this.view.closeModal({})
                            }
                        }
                    })
                    this.optInit('list')
                }
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
                this.#setBtnModal()
                this.eventInModal({
                    idElement: '#myCharacter',
                    events: [ 'click', 'change' ],
                    fn: ({ e, formData }) => {
                        let property = e.target.name
                        if ((e.target.tagName === 'IMG' && e.type === 'click') ||
                            (
                                (property === 'category_id' || property === 'breed_id')
                                    && e.type === 'change'
                            )) {
                            this.#avatar({ formData })
                        }
                    }
                })
                this.view.loading.hide()
            }
        })
    }
}