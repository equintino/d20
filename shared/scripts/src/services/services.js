import ReadFile from '../../lib/readFile.js'
import Login from './login.js'
import Menu from './menu.js'
import Character from './character.js'
import Mission from './mission.js'
import Breed from './breed.js'
import Category from './category.js'
import Avatar from './avatar.js'
import User from './user.js'

export default class Services {
    #readFile

    constructor() {
        this.#readFile = new ReadFile()
    }

    static open({ method, url, formData }) {
        const services = new Services()
        services.#readFile.open({
            method,
            url,
            formData,
            async: false
        })
        return services.#readFile.content
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