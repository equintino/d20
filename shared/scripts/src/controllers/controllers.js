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
            login: new Login({
                view: this.#views.initClass('login'),
                service: this.#services.initClass('login')
            })
        })
    }

    #menu() {
        Menu.initializer({
            menu: new Menu({
                view: this.#views.initClass('menu'),
                service: this.#services.initClass('menu')
            }),
            fn: (page) => {
                this.#scriptLoad(page)
            }
        })
    }

    #scriptLoad({ cls, script }) {
        switch(script) {
            case 'character':
                Character.initializer(
                    new Character({
                        view: this.#views.initClass(cls),
                        service: this.#services.initClass(cls)
                    })
                )
                break
            case 'mission':
                Mission.initializer(
                    new Mission({
                        view: this.#views.initClass(cls),
                        service: this.#services.initClass(cls)
                    })
                )
                break
            case 'breed':
                Breed.initializer(
                    new Breed({
                        view: this.#views.initClass(cls),
                        service: this.#services.initClass(cls)
                    })
                )
                break
            case 'category':
                Category.initializer(
                    new Category({
                        view: this.#views.initClass(cls),
                        service: this.#services.initClass(cls)
                    })
                )
                break
            case 'avatar':
                Avatar.initializer({
                    view: this.#views.initClass(cls),
                    service: this.#services.initClass(cls)
                })
                break
            case 'user':
                User.initializer({
                    view: this.#views.initClass(cls),
                    service: this.#services.initClass(cls)
                })
                break
        }
    }

    static initializer = async (deps) => {
        const controllers = new Controllers(deps)
        controllers.#selection()
    }
}