import AbstractViews from './abstractviews.js'

export default class Login extends AbstractViews {
    #addLogin
    #enterForm
    #dbs
    #version

    constructor() {
        super()
    }

    initializer() {
        this.#addLogin = document.querySelector('#add')
        this.#enterForm = document.querySelector('#signinForm')
        this.#version = document.querySelector("#version")
        this.#dbs = document.querySelector('[name=db]')

        this.#enterForm.onsubmit = (e) => {
            e.preventDefault()
        }
    }

    setVersion(version) {
        this.#version.innerHTML = version
    }

    setConnList(connections) {
        let opt = '<option value=""></option>'
        for (let i in connections) {
            opt += `<option value="${i}">${i}</option>`
        }
        this.#dbs.innerHTML = opt
    }

    setTypeDb(types) {
        let opt = '<option value=""></option>'
        for (let i of types) {
            opt += `<option value="${i}">${i}</option>`
        }
        document.querySelector('[name=type]').innerHTML = opt
    }

    enterLogin(fn) {
        this.#enterForm.onsubmit = (e) => {
            e.preventDefault()
            this.#enterForm.querySelector("[type=submit]")
                .innerHTML = "<i class='fa fa-sync-alt schedule' style='padding: 5px'></i>"

            let formData = new FormData(this.#enterForm)
            return (
                fn(formData),
                setTimeout(() => {
                    this.#enterForm.querySelector('[type=submit').innerHTML = 'Entrar'
                }, 600)
            )
        }
    }

    confAddLogin(fn) {
        this.#addLogin.addEventListener('click', (e) => {
            e.preventDefault()
            fn()
        })
    }

    setGroups(data) {
        let groups = JSON.parse(data)
        let opt = '<option value=""></option>'
        for (let i in groups) {
            opt += `<option value='${groups[i].id}'>${i}</option>`
        }
        this.modal.getBox().querySelector('[name=group_id]').innerHTML = opt
    }

    setNameLogin(login) {
        this.modal.getBox().querySelector('[name=login]').value = login
    }
}