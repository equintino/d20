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
                this.setButton(elem)
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
                alert('edit')
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
}