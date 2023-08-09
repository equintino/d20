import AbstractControllers from "./abstractcontrollers.js"

export default class Menu extends AbstractControllers {
    static initializer( menu, fn ) {
        menu.init(fn)
    }

    init(fn) {
        let page = 'home'
        this.showPage({ page })
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
            this.showPage({ page })
            this.view.setIdentification(this.service.identification(page))
            if (typeof(fn) === 'function') fn(page)
        })
    }
}