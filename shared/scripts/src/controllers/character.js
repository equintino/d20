import AbstractControllers from "./abstractcontrollers.js"

export default class Character extends AbstractControllers {
    constructor(deps) {
        super(deps)
    }

    static initializer(deps) {
        const character = new Character(deps)
        character.init()
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
                    this.view.avatarSelected(form)
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

    btnAction(btnName) {
        switch (btnName) {
            case 'back':
                this.showPage('character', (elem) => {
                    this.view.backInit(elem, (btnName) => {
                        this.optInit(btnName)
                    })
                })
                break
            case 'save':
                this.view.submit('#character form', (formData, validate) => {
                    if (validate) {
                        let resp = this.service.save('character/save', formData)
                        this.message(resp)
                        if (resp.indexOf('success') !== -1) {
                            this.view.reset('#character form')
                            this.view.removeAvatarSelected()
                        }
                    }
                    this.view.loading.hide()
                })
                break
            case 'breed':
                this.view.carousel('#avatar', this.openFile('breed/list'), (e) => {
                    this.view.setDetails(e)
                    this.view.loading.hide()
                })
                break
            case 'clear':
                this.view.reset('#character form', () => {
                    this.view.loading.hide()
                })
                break
        }
    }
}