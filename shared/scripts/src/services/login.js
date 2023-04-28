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

    validate(data) {
        if (data.get("password") !== data.get("confPassword")) {
            return "The passwords are different"
        }
        return null
    }
}