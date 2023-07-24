import Cookie from './../../lib/cookie.js'
import Login from './login.js'
import Menu from './menu.js'
import Character from './character.js'
import Mission from './mission.js'
import Breed from './breed.js'
import Category from './category.js'
import Avatar from './avatar.js'
import User from './user.js'
import Player from './player.js'
import Shield from './shield.js'
import Config from './config.js'

export default class Controllers {
    #views
    #services

    constructor({ views, services }) {
        this.#views = views
        this.#services = services
    }

    #selection() {
        if (Cookie.getCookie('login')) return this.#menu()
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
        Menu.initializer(
            new Menu({
                view: this.#views.initClass('menu'),
                service: this.#services.initClass('menu'),
            }),
            (page) => {
                this.#scriptLoad(page)
            }
        )
    }

    #scriptLoad(page) {
        switch(page) {
            case 'character':
                Character.initializer(
                    new Character({
                        view: this.#views.initClass(page),
                        service: this.#services.initClass(page)
                    })
                )
                break
            case 'mission':
                Mission.initializer(
                    new Mission({
                        view: this.#views.initClass(page),
                        service: this.#services.initClass(page)
                    })
                )
                break
            case 'breed':
                Breed.initializer(
                    new Breed({
                        view: this.#views.initClass(page),
                        service: this.#services.initClass(page)
                    })
                )
                break
            case 'category':
                Category.initializer(
                    new Category({
                        view: this.#views.initClass(page),
                        service: this.#services.initClass(page)
                    })
                )
                break
            case 'avatar':
                Avatar.initializer(
                    new Avatar({
                        view: this.#views.initClass(page),
                        service: this.#services.initClass(page)
                    })
                )
                break
            case 'user':
                User.initializer(
                    new User({
                        view: this.#views.initClass(page),
                        service: this.#services.initClass(page)
                    })
                )
                break
            case 'player':
                Player.initializer(
                    new Player({
                        view: this.#views.initClass(page),
                        service: this.#services.initClass(page)
                    })
                )
                break
            case 'shield':
                Shield.initializer(
                    new Shield({
                        view: this.#views.initClass(page),
                        service: this.#services.initClass(page)
                    })
                )
                break
            case 'config':
                Config.initializer(
                    new Config({
                        view: this.#views.initClass(page),
                        service: this.#services.initClass(page)
                    })
                )
                break
        }
    }

    static initializer = async (deps) => {
        const controllers = new Controllers(deps)
        controllers.#selection()
    }
}