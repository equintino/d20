import AbstractControllers from "./abstractcontrollers.js"

export default class Config extends AbstractControllers {
    constructor(cls) {
        super(cls)
        this.#init()
    }

    #init() {
        this.view.clickScreen(({ act, formData }) => {
            if (act === 'add') {
                this.openModal({
                    page: 'config/register',
                    fn: () => {
                        document.querySelector('#form-config').onsubmit = (e) => {
                            e.preventDefault()
                            const formData = new FormData(e.target)
                            const resp = this.getDataFile({
                                    method: 'POST',
                                    url: 'config/save',
                                    formData
                                })
                            if (resp.indexOf('success') !== -1) {
                                this.view.closeAllModal()
                                this.showPage({
                                    page: 'config',
                                    fn: () => {
                                        this.#init()
                                    }
                                })
                            }
                            this.message({ msg: resp })
                        }
                    }
                })
            }
            if (act === 'edit') {
                this.#edition(formData)
            }
            if (act === 'delete') {
                this.confirm({
                    title: 'DADOS DE CONEXÃO COM O BANCO',
                    message: 'Deseja realmente excluir esta conexão?',
                    fn: ({ e }) => {
                        if (e.target.value === 'yes') {
                            let resp = this.getDataFile({
                                method: 'POST',
                                url: 'config/delete',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.view.closeAllModal()
                                this.showPage({
                                    page: 'config',
                                    fn: () => {
                                        this.#init()
                                    }
                                })
                            }
                            this.message({ msg: resp })
                        }
                    }
                })
            }
        })
    }

    #edition(formData) {
        this.openModal({
            page: 'config/edit',
            formData,
            fn: (data) => {
                const form = data.querySelector('form')
                form.onsubmit = (e) => {
                    e.preventDefault()
                    const formData = new FormData(form)
                    const resp = this.getDataFile({
                            method: 'POST',
                            url: 'config/update',
                            formData
                        })
                    if (resp.indexOf('success') !== -1) {
                        this.view.closeAllModal()
                        this.showPage({
                            page: 'config',
                            fn: () => {
                                this.#init()
                            }
                        })
                    }
                    this.message({ msg: resp })
                }
            }
        })
    }
}
