import Cookie from './../../lib/cookie.js'
import Login from './login.js'
import Menu from './menu.js'
import Character from './character.js'
import Mission from './mission.js'
import Breed from './breed.js'
import Category from './category.js'
import Avatar from './avatar.js'
import User from './user.js'

export default class Controllers {
    #views
    #services

    constructor({ views, services }) {
        this.#views = views
        this.#services = services
    }

    #selection() {
        if (Cookie.getCookie('login') !== undefined) {
            return this.#menu()
        }

        this.#login()
    }

    #login() {
        Login.initializer({
            view: this.#views.initClass('login'),
            service: this.#services.initClass('login')
        })
    }

    #menu() {
        Menu.initializer({
            view: this.#views.initClass('menu'),
            service: this.#services.initClass('menu')
        }, (page) => {
            this.#scriptLoad(page)
        })
    }

    #scriptLoad(page) {
        switch(page) {
            case 'character':
                Character.initializer({
                    view: this.#views.initClass(page),
                    service: this.#services.initClass(page)
                })
                break
            case 'mission':
                Mission.initializer({
                    view: this.#views.initClass(page),
                    service: this.#services.initClass(page)
                })
                break
            case 'breed':
                Breed.initializer({
                    view: this.#views.initClass(page),
                    service: this.#services.initClass(page)
                })
                break
            case 'category':
                Category.initializer({
                    view: this.#views.initClass(page),
                    service: this.#services.initClass(page)
                })
                break
            case 'avatar':
                Avatar.initializer({
                    view: this.#views.initClass(page),
                    service: this.#services.initClass(page)
                })
                break
            case 'user':
                User.initializer({
                    view: this.#views.initClass(page),
                    service: this.#services.initClass(page)
                })
                break
        }
    }

    static initializer = async (deps) => {
        const controllers = new Controllers(deps)
        controllers.#selection()
    }
}