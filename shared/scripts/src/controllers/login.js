import AbstractControllers from "./abstractcontrollers.js"

export default class Login extends AbstractControllers {
    constructor(deps) {
        super(deps)
    }

    static async initializer({ login }) {
        login.init()
    }

    init() { this.#showLogin() }

    #showLogin() {
        this.view.showPage({
            page: this.openFile({
                url: 'login'
            }),
            fn: () => {
                this.view.initializer()
            }
        })
        this.#setListConnection()
        this.#setVersion()
        this.#addLogin()
        this.#enterLogin()
    }

    #setListConnection() {
        try {
            this.view.setConnList(this.getDataFile({
                url: './src/Config/.config.json'
            }))
        } catch (error) {
            this.view.openModal(this.openFile({
                url: './src/Modals/config.php'
            }), {}, () => {
                this.view.autoFocusModal('connectionName')
                this.view.setTypeDb(this.service.getTypeDb().db)
            }, (response) => {
                const resp = this.service.save('config/init', response)
                if (resp !== false) {
                    this.view.message(resp, 'var(--cor-success)')
                    window.location.reload()
                }
            })
        }
    }

    #enterLogin() {
        this.view.enterLogin((formData) => {
            const response = this.getDataFile({
                url: 'login/enter',
                formData
            })
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
            if (response == true) {
                this.service.setCookie(formData)
                return window.location.reload()
            }
            this.view.message(response, 'var(--cor-warning)')
        })
    }

    #addLogin() {
        this.view.confAddLogin(() => {
            this.view.openModal({
                page: this.openFile({
                    method: 'POST',
                    url: 'register'
                }),
                formData: {
                    'action': 'add',
                    'act': 'add',
                    'user': 'login'
                },
                fn: () => {
                    this.view.setBtnModal({
                        buttons: '<button class="btn btn-rpg btn-silver" value="reset">Limpar'
                            + '</button><button class="btn btn-rpg btn-danger" value="save">'
                            + 'Salvar</button>',
                        fn: ({ e }) => {
                            let btnName = e.target.value
                            let id = `#${this.view.modal.getBox().id}`
                            if (btnName === 'save') {
                                this.view.submit({
                                    form: id + ' form',
                                    fn: ({ formData, validate }) => {
                                        let resp = '<span class="warning">Thie field is necessary</span>'
                                        if (validate) {
                                            resp = this.service.save({ url: 'user/save', formData })
                                            if (resp.indexOf('success') !== -1) {
                                                this.view.closeModal()
                                            }
                                        }
                                        this.message({ msg: resp })
                                    }
                                })
                            }
                        }
                    })
                    this.view.autoFocusModal('name')
                },
                response: (response) => {
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
                }
            })
        })
    }

    #setVersion() {
        this.view.setVersion(
            this.getDataFile({
                method: 'POST',
                url: './version.json'
            }).version
        )
    }
}