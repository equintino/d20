import AbstractControllers from "./abstractcontrollers.js"

export default class Menu extends AbstractControllers {
    constructor(deps) {
        super(deps)
    }

    static initializer({ menu, fn }) {
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
            fn({ cls: page, script: page })
        })
    }
}