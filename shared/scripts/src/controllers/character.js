import AbstractControllers from "./abstractcontrollers.js"

export default class Character extends AbstractControllers {
    constructor(deps) {
        super(deps)
    }

    static initializer(deps) {
        const character = new Character(deps)
        character.#init()
    }

    #init() {
        this.view.setButtons((btnName) => {
            this.#optInit(btnName)
        })
    }

    #optInit(btnName) {
        this.view.loading.show()
        if (btnName === 'new') {
            return this.view.showPage(this.service.open('GET', 'character/add'), (elem) => {
                this.#setButton(elem)
                this.view.changeCategory((formData) => {
                    let list = this.service.open('POST', 'avatar', formData)

                    formData.append('act', 'list')
                    formData.append('response', list)

                    this.view.openModal(this.service.open('POST', 'avatar/show', formData), formData, () => {
                        list = JSON.parse(list)
                        this.view.carousel('#imageAvatar', list, (data) => {
                            this.view.imgSelected('#avatarList', data.idImage)
                        })
                        this.view.eventInModal('#avatarList', 'change', (formData) => {
                            list = JSON.parse(this.service.open('POST', 'avatar', formData))
                            this.view.carousel('#imageAvatar', list, (data) => {
                                this.view.imgSelected('#avatarList', data.idImage)
                            })
                            let category = JSON.parse(this.service.open('POST', `category/id/${formData.get('idCategory')}`))
                            this.view.updateCategory('#avatarList', category)
                        })

                        this.view.setBtnModal('<button class="btn btn-rpg btn-danger" value="selected">Selecionar</button>', (e, form) => {
                            let btnName = e.target.value
                            if (btnName === 'selected') {
                                this.view.avatarSelected(form)
                                this.view.closeModal()
                            }
                        })
                    }, (response) => {
                        /** submit */
                        console.log(
                            response
                        )
                    })
                })
            })
        }

        if (btnName === 'list') {
            return this.view.showPage(this.service.open('GET', 'character/list'), (elem) => {
                this.#setButton(elem)
            })
        }
    }

    #setButton(elem) {
        elem.querySelectorAll('button').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                this.view.loading.show()
                e.preventDefault()
                let btnName = e.target.value
                switch (btnName) {
                    case 'back':
                        this.view.showPage(this.service.open('GET', 'character'), (elem) => {
                            this.view.backInit(elem, (btnName) => {
                                this.#optInit(btnName)
                            })
                        })
                        break
                    case 'save':
                        this.view.submit('#character form', (formData) => {
                            let resp = this.service.save('character/save', formData)
                            console.log(
                                resp
                            )
                            this.view.message(resp, this.#background(resp))
                            this.view.loading.hide()

                            if (resp.indexOf('success') !== -1) {
                                this.view.openModal(this.service.open('GET', 'character/story'), {}, (elem) => {
                                    elem.querySelector('[name=story]').focus()
                                    this.view.setBtnModal('<button class="btn btn-rpg btn-silver" value="reset">Limpar</button><button class="btn btn-rpg btn-danger" value="save">Salvar</button>', (e, form) => {
                                        let btnName = e.target.value
                                        if (btnName === 'save') {
                                            formData.append('story', form.querySelector('[name=story]').value)
                                            console.log(
                                                formData,
                                                this.service.open('POST', 'character/update', formData)
                                            )
                                            // this.view.closeModal()
                                        }
                                    })
                                }, (response) => {
                                    console.log(
                                        response
                                    )
                                })
                            }
                        })
                        break
                    case 'breed':
                        const list = JSON.parse(this.service.open('POST', 'breed/list'))
                        this.view.carousel('#avatar', list, (e) => {
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
            })
        })
    }

    #background(resp) {
        if (resp.indexOf('danger') !== -1) {
            return 'var(--cor-danger)'
        }
        if (resp.indexOf('warning') !== -1) {
            return 'var(--cor-warning)'
        }
        return 'var(--cor-success)'
    }
}