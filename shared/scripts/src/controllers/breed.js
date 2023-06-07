import AbstractControllers from "./abstractcontrollers.js"

export default class Breed extends AbstractControllers {
    constructor(cls) {
        super(cls)
    }

    optInit(btnName) {
        let page = (btnName === 'new' ? 'breed/add' : 'breed/list')
        this.showPage({
            page, fn: (elem) => {
                this.setButtons({
                    elem
                })
                if (btnName === 'new') {
                    this.view.changeFile(elem)
                }
            }
        })
    }

    btnAction({ btn, elem }) {
        const btnName = btn.target.value
        switch (btnName) {
            case 'back':
                this.btnBack('breed')
                break
            case 'clear':
                this.btnClean('#breed')
                this.view.cleanImg('#thumb_image')
                break
            case 'save':
                this.view.submit({
                    form: '#form_breed',
                    fn: ({ formData, validate }) => {
                        let resp
                        if (validate) {
                            resp = this.getDataFile({
                                method: 'POST',
                                url: 'breed/save',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.btnClean('#breed')
                                this.view.cleanImg('#thumb_image')
                            }
                        } else {
                            resp = "<span class='warning'>This field is necessary!!!</span>"
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
                this.view.updateDataBreed({ btn })
                this.view.loading.hide()
        }
    }

    #edition(elem) {
        const formData = this.view.edition(elem)
        if (typeof(formData) === 'string') {
            this.view.loading.hide()
            return this.message({ msg: formData})
        }
        this.openModal({
            page: 'breed/edit',
            title: 'MODO DE EDIÇÃO DE RAÇAS',
            formData,
            fn: () => {
                this.view.loading.hide()
            }
        })
        this.view.setBtnModal({
            buttons: '<button class="btn btn-rpg btn-silver" value="delete">Excluir</button><button class="btn btn-rpg btn-danger" value="save">Salvar</button>',
            fn: ({ e, formData }) => {
                const btnName = e.target.value
                if (btnName === 'save') {
                    const resp = this.getDataFile({
                        method: 'POST',
                        url: 'breed/save',
                        formData
                    })
                    if (resp.indexOf('success') !== -1) {
                        this.view.closeModal()
                        this.message({ msg: resp })
                        this.optInit('list')
                        setTimeout(() => {
                            this.message({ msg: '<span class="warning">Necessary reload for update image!</span>'})
                        }, 2000)
                    }
                }
                if (btnName === 'delete') {
                    this.confirm({
                        title: 'MODO DE EXCLUSÃO DE RAÇAS',
                        message: 'Deseja realmente excluir esta RAÇA?',
                        fn: ({ e }) => {
                            if (e.target.value === 'yes') {
                                this.getDataFile({
                                    method: 'POST',
                                    url: 'breed/delete',
                                    formData
                                })
                                this.view.closeAllModal()
                                this.optInit('breed/list')
                            }
                        }
                    })
                }
            }
        })
        this.eventInModal({
            idForm: '#form-breed',
            events: [ 'change'],
            fn: ({ e }) => {
                if (e.target.attributes['type'].value === 'file') {
                    this.view.thumbImage({
                        origin: '#image',
                        destination: '#thumb_image'
                    })
                }
            }
        })
    }
}