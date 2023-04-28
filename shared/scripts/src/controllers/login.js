import AbstractControllers from "./abstractcontrollers.js"

export default class Login extends AbstractControllers {
    constructor(deps) {
        super(deps)
    }

    static async initializer(deps) {
        const login = new Login(deps)
        login.init()
    }

    init() {
        this.#showLogin()
    }

    #showLogin() {
        this.view.showPage(this.service.open('POST', 'login'), () => {
            this.view.initializer()
        })
        this.#setListConnection()
        this.#setVersion()
        this.#addLogin()
        this.#enterLogin()
    }

    #setListConnection() {
        let conf
        try {
            conf = JSON.parse(this.service.open('POST', './src/Config/.config.json'))
        } catch (error) {
            return this.view.openModal(this.service.open('POST', './src/Modals/config.php'), {

            }, () => {
                this.view.setTypeDb(this.service.getTypeDb().db)
            }, (response) => {
                const resp = this.service.save('config/init', response)
                if (resp !== false) {
                    this.view.message(resp, 'var(--cor-success)')
                    window.location.reload()
                }
            })
        }
        this.view.setConList(conf)
    }

    #enterLogin() {
        this.view.enterLogin((data) => {
            const response = this.service.open('POST','login/enter', data)
            if (response === 'reset password') {
                return this.view.openModal(this.service.readFile('token'), {}, () => {
                    let params = new URLSearchParams(data)
                    this.view.setNameLogin(params.get('login'))
                }, (response) => {
                    const resp = this.service.update('user', response)
                    if (resp.indexOf('success')) {
                        this.view.closeModal()
                    }
                    this.view.message(resp, 'var(--cor-success)')
                })
            }
            if (response === '1') {
                this.service.setCookie(data)
                return window.location.reload()
            }
            this.view.message(response, 'var(--cor-warning)')
        })
    }

    #addLogin() {
        this.view.confAddLogin(() => {
            this.view.openModal(this.service.open('POST', 'register'), {
                'action': 'add',
                'act': 'add',
                'user': 'login'
            }, () => {
                this.view.setBtnModal(
                    '<button class="btn btn-rpg btn-silver" value="reset">Limpar</button><button class="btn btn-rpg btn-danger" value="save">Salvar</button>',
                    (e) => {
                        let btnName = e.target.value
                        if (btnName === 'save') {
                            let formData = this.view.submit(this.view.modal.getBox())
                            let resp = this.service.save('user/save', formData)
                            let background = 'var(--cor-warning)'
                            if (resp.indexOf('success') !== -1) {
                                background = 'var(--cor-success)'
                                this.view.modal.close()
                            }
                            this.view.message(resp, background)
                        }
                    }
                )
            }, (response) => {
                const validate = this.service.validate(response)
                if (validate !== null) {
                    return this.view.message(validate, 'var(--cor-warning)')
                }
                const resp = this.service.save('user', response)
                let background = 'var(--cor-warning)'
                if (resp.indexOf('success') !== -1) {
                    background = 'var(--cor-success)'
                    this.view.closeModal()
                }

                this.view.message(resp, background)
            })
        })
    }

    #setVersion() {
        this.view.setVersion(
            JSON.parse(this.service.open('POST', './version.json')).version
        )
    }
}