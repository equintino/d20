import Cookie from './../../lib/cookie.js'
import utils from "../../lib/utils.js"
import AbstractServices from './abstractservices.js'

const capitalize = utils.capitalize

export default class Menu extends AbstractServices {
    constructor() {
        super()
    }

    getCookie(name) {
        return Cookie.getCookie(name)
    }

    identification(page) {
        const ident = {
            'home'     : 'Usuário: ' + capitalize(this.getCookie('login')),
            'character': 'Gerenciamento de Personagens',
            'mission'  : 'Gerenciamento de Missões',
            'breed'    : 'Gerenciamento de Raças',
            'category' : 'Gerenciamento de Classes',
            'avatar'   : 'Gerenciamento de Avatar',
            'player'   : 'Gerenciamento de Jogadores',
            'user'     : 'Gerenciamento de Usuários',
            'shield'   : 'Gerenciamento de Acessos'
        }
        return ident[page]
    }

    exit(fn) {
        const cookies = Cookie.getAll()
        for (let name in cookies) {
            Cookie.deleteCookie(name)
        }
        fn()
    }
}