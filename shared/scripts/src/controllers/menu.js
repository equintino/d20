import AbstractControllers from "./abstractcontrollers.js"

export default class Menu extends AbstractControllers {
    constructor(deps) {
        super(deps)
    }

    static async initializer(deps, fn) {
        const menu = new Menu(deps)
        menu.#init(fn)
    }

    #init(fn) {
        let page = 'home'
        this.view.showPage(this.service.open('GET', page))
        this.view.setIdentification(this.service.identification(page))
        this.#setMenu(fn)
    }

    #setMenu(fn) {
        this.view.setMenu((page) => {
            if (page === 'exit') {
                return this.service.exit(() => {
                    this.view.reload()
                })
            }
            this.view.showPage(this.service.open('GET', page))
            this.view.setIdentification(this.service.identification(page))
            fn(page)
        })
    }
}