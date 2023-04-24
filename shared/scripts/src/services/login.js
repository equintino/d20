import Cookie from './../../lib/cookie.js'
import AbstractServices from './abstractservices.js'

export default class Login extends AbstractServices {
    constructor() {
        super()
    }

    getTypeDb() {
        return {
            "db": [
                "mysql",
                "sqlsrv"
            ]
        }
    }

    readFile(page, data) {
        this.readFile.open('POST', page, false, data)
        return this.readFile.content
    }

    save(page, data) {
        this.readFile.open('POST', page, false, data)
        return this.readFile.content
    }

    update(page, data) {
        data.append('act', 'update')
        this.readFile.open('POST', page, false, data)
        return this.readFile.content
    }

    validate(data) {
        if (data.get("password") !== data.get("confPassword")) {
            return "The passwords are different"
        }
        return null
    }

    setCookie(data) {
        for (let i of data) {
            Cookie.setCookie(i[0], i[1])
        }
    }

    getNameLogin() {
        Cookie.getCookie('login')
    }
}