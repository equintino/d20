import AbstractControllers from "./abstractcontrollers.js"

export default class User extends AbstractControllers {
    constructor(cls) {
        super(cls)
    }

    optInit(btnName) {
        const page = (btnName === 'new' ? 'user/add' : 'user/list')
        this.showPage({
            page,
            fn: (elem) => {
                if (btnName === 'list') {
                    this.view.getUserEdition(elem, (data) => {
                        this.view.loading.show()
                        this.#edition(data)
                    })
                }
                this.setButtons({
                    elem
                })
            }
        })
    }

    #edition({ action, formData }) {
        switch (action) {
            case 'edit':
                formData.append('act', 'edit')
                this.openModal({
                    title: 'MODO DE EDIÇÃO DE USUÁRIO',
                    page: 'user/edit',
                    formData
                })
                this.view.setBtnModal({
                    buttons: '<button class="btn btn-rpg btn-danger" value="save">Gravar alteração"<button>',
                    fn: ({ e, formData, form }) => {
                        if (e.target.value === 'save') {
                            let resp = this.getDataFile({
                                before: () => {
                                    this.view.loading.show()
                                },
                                method: 'POST',
                                url: 'user/save',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.view.closeModal()
                                this.optInit('list')
                            }
                            this.message({ msg: resp })
                        }
                    }
                })
                break
            case 'delete':
                this.confirm({
                    title: 'MODO DE EXCLUSÃO DE USUÁRIO',
                    message: `Deseja realmente excluir?(${formData.get('login')})`,
                    fn: ({ e }) => {
                        if (e.target.value === 'yes') {
                            let resp = this.getDataFile({
                                before: () => {
                                    this.view.loading.show()
                                },
                                method: 'POST',
                                url: 'user/delete',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.view.closeAllModal()
                            }
                            this.message({ msg:  resp })
                            this.optInit('list')
                        }
                    }
                })
                break
            case 'reset':
                this.#reset(formData)
                break
        }
        this.view.loading.hide()
    }

    #reset(formData) {
        this.confirm({
            title: 'MODO DE RESET DE SENHA',
            message: 'A senha será renovada no próximo login',
            fn: ({ e }) => {
                if (e.target.value === 'yes') {
                    let resp = this.getDataFile({
                        before: () => {
                            this.view.loading.show()
                        },
                        method: 'POST',
                        url: 'user/reset',
                        formData
                    })
                    if (resp.indexOf('success') !== -1) {
                        this.view.closeAllModal()
                        this.optInit('list')
                    }
                    this.message({ msg: resp })
                }
            }
        })
    }

    btnAction({ btn, elem }) {
        switch(btn.target.value) {
            case 'back':
                this.btnBack('user')
                break
            case 'clean':
                this.btnClean('#edit')
                break
            case 'save':
                this.view.submit({
                    form: '#loginRegister',
                    fn: ({ formData, validate }) => {
                        if (validate) {
                            let resp = this.getDataFile({
                                method: 'POST',
                                url: 'user/save',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.btnClean('#edit')
                                resp = '<span class="success">User save successfull</span>'
                            }
                            this.message({ msg: resp })
                        }
                        this.view.loading.hide()
                    }
                })
                break
        }
    }
}