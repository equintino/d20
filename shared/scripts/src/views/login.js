import Views from './views.js'
import Modal from './../../lib/modal.js'
import Message from './../../lib/message.js'

export default class Login {
    #addLogin
    #enterForm
    #dbs
    #version
    #groups
    #modal

    constructor() {
    }

    showPage(page) {
        Views.showPage(page)
        this.initializer()
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

    setConList(connections) {
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

    message(msg, background) {
        Message.alertLatch(msg, background)
    }

    confAddLogin(fn) {
        this.#addLogin.addEventListener('click', (e) => {
            fn()
        })
    }

    openModal(page, params, fn, response) {
        this.#modal = new Modal()
        this.#modal.openModal("#boxe_main", page, (e) => {
            let formData = new FormData(e.target)
            for (let i in params) {
                formData.append(i, params[i])
            }
            response(formData)
        })
        this.#groups = this.#modal.getBox().querySelector('[name=group_id]')
        fn()
    }

    closeModal() {
        this.#modal.close()
    }

    setGroups(data) {
        let groups = JSON.parse(data)
        let opt = '<option value=""></option>'
        for (let i in groups) {
            opt += `<option value='${groups[i].id}'>${i}</option>`
        }
        this.#groups.innerHTML = opt
    }

    setNameLogin(login) {
        this.#modal.getBox().querySelector('[name=login]').value = login
    }
}