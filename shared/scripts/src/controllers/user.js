import AbstractControllers from "./abstractcontrollers.js"

export default class User extends AbstractControllers {
    constructor(deps) {
        super(deps)
    }

    static initializer(deps) {
        const user = new User(deps)
        user.init()
    }

    init() {
        this.view.setButtons((btnName) => {
            if (btnName === 'new') {
                return this.view.showPage(this.service.open('GET', 'user/add'))
            }
            if (btnName === 'list') {
                return this.view.showPage(this.service.open('GET', 'user/list'))
            }
        })
    }
}