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
        if (btnName === 'new') {
            return this.view.showPage(this.service.open('GET', 'character/add'), (elem) => {
                this.#setButton(elem)
                this.view.changeCategory((formData) => {
                    let list = this.service.open('POST', 'avatar', formData)
                    formData.append('act', 'list')
                    formData.append('response', list)

                    this.view.openModal(this.service.open('POST', 'avatar/show', formData), formData, () => {
                        this.view.carousel('#imageAvatar', JSON.parse(list))
                        this.view.eventInModal('change', (formData) => {
                            list = this.service.open('POST', 'avatar', formData)
                            this.view.carousel('#imageAvatar', JSON.parse(list))

                            let category = JSON.parse(this.service.open('POST', `category/id/${formData.get('idCategory')}`))
                            this.view.updateCategory(category)
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
                        this.view.submit('#character form')
                        break
                    case 'breed':
                        const list = JSON.parse(this.service.open('POST', 'breed/list'))
                        this.view.carousel('#avatar', list, (e) => {
                            this.view.setDetails(e)
                        })
                        break
                    case 'clear':
                        this.view.reset('#character form')
                        break
                }
            })
        })
    }
}