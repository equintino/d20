import utils from '../../lib/utils.js'
import Login from './login.js'
import Menu from './menu.js'
import Character from './character.js'
import Mission from './mission.js'
import Breed from './breed.js'
import Category from './category.js'
import Avatar from './avatar.js'
import User from './user.js'

const loading = utils.loading
export default class Views {
    #container

    constructor() {
        this.#container = document.querySelector('#container_main')
    }

    static showPage({ page, fn }) {
        const view = new Views()
        view.#container.innerHTML = page
        if (typeof(fn) === 'function') fn(view.#container)
        setTimeout(() => {
            loading.hide()
        }, 100)
    }

    initClass(cls) {
        switch (cls) {
            case 'login':
                return new Login()
            case 'menu':
                return new Menu()
            case 'character':
                return new Character()
            case 'mission':
                return new Mission()
            case 'breed':
                return new Breed()
            case 'category':
                return new Category()
            case 'avatar':
                return new Avatar()
            case 'user':
                return new User()
        }
    }
}