import AbstractControllers from "./abstractcontrollers.js"

export default class Category extends AbstractControllers {
    constructor(deps) {
        super(deps)
    }

    static initializer(deps) {
        const category = new Category(deps)
        category.#init()
    }

    #init() {
        this.view.setButtons((btnName) => {
            this.#optInit(btnName)
        })
    }

    #optInit(btnName) {
        if (btnName === 'new') {
            return this.view.showPage(this.service.open('GET', 'category/add'), (elem) => {
                this.#setButton(elem)
            })
        }

        if (btnName === 'list') {
            return this.view.showPage(this.service.open('GET', 'category/list'), (elem) => {
                this.#setButton(elem)
            })
        }
    }

    #setButton(elem) {
        elem.querySelectorAll('button').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                let btnName = e.target.value
                switch (btnName) {
                    case 'back':
                        this.view.showPage(this.service.open('GET', 'category'), (elem) => {
                            this.view.backInit(elem, (btnName) => {
                                this.#optInit(btnName)
                            })
                        })
                        break
                    case 'save':
                        this.view.submit('#category form')
                        break
                    case 'clear':
                        this.view.reset('#category form')
                        break
                }
            })
        })
    }
}