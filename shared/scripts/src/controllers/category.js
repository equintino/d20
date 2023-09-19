import AbstractControllers from "./abstractcontrollers.js"

export default class Category extends AbstractControllers {
    optInit(btnName) {
        const page = (btnName === 'new' ? 'category/add' : 'category/list')
        this.showPage({
            page,
            fn: (elem) => {
                this.setButtons({
                    elem,
                    fn: (data) => {
                        this.view.btnActive(data)
                    }
                })
                if (btnName === 'new') this.view.changeImg()
            }
        })
    }

    btnAction({ btn, elem }) {
        switch (btn.target.value) {
            case 'back':
                this.btnBack('category')
                break
            case 'clear':
                this.btnClean('#category')
                this.view.cleanImg()
                break
            case 'save':
                this.view.submit({
                    form: '#category form',
                    fn: ({ formData, validate }) => {
                        let resp
                        if (validate) {
                            resp = this.getDataFile({
                                method: 'POST',
                                url: 'category/save',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.btnClean('#category')
                                this.view.cleanImg()
                            }
                        } else {
                            resp = '<span class="warning">This field is necessary</span>'
                        }
                        this.message({ msg: resp })
                        this.view.loading.hide()
                    }
                })
                break
            case 'edit':
                this.#edition(elem)
                break
            default:
                this.view.updateCategory(btn)
        }
    }

    #edition(elem) {
        const formData = this.view.edition(elem)
        if (formData === null) {
            this.view.loading.hide()
            return this.message({ msg: '<span class="warning">No category selected</span>'})
        }
        this.openModal({
            title: 'MODO DE EDIÇÃO DE CLASSE',
            page: `category/edit`,
            formData,
            fn: () => {
                this.view.loading.hide()
            }
        })
        this.view.setBtnModal({
            buttons: '<button class="btn btn-rpg btn-silver" value="delete">Excluir</button><button class="btn btn-rpg btn-danger" value="save">Salvar</button>',
            fn: ({ e, form, formData }) => {
                const btnName = e.target.value
                if (btnName === 'delete') {
                    this.confirm({
                        message: 'Deseja realmente excluir esta CLASSE?',
                        fn: ({ e }) => {
                            let resp
                            if (e.target.value === 'yes') {
                                resp = this.getDataFile({
                                    method: 'POST',
                                    url: 'category/delete',
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
                if (btnName === 'save') {
                    this.view.submit({
                        form: '#form_edit',
                        fn: ({ formData, validate}) => {
                            if (validate) {
                                let resp = this.getDataFile({
                                    method: 'POST',
                                    url: 'category/save',
                                    formData
                                })
                                if (resp.indexOf('success') !== -1) {
                                    this.view.closeModal()
                                    this.optInit('list')
                                    resp = '<span class="warning">It is necessary reload this page<span>'
                                }
                                this.message({ msg: resp })
                            } else {
                                this.message({ msg: '<span class="warning">This field is necessary<span>'})
                            }
                        }
                    })
                }
            }
        })
        this.eventInModal({
            idForm: '#form_edit',
            events: [ 'change' ],
            fn: () => {
                this.view.thumbImage({ origin: '#image', destination: '#thumb_image' })
            }
        })
    }
}