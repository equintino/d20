import AbstractControllers from "./abstractcontrollers.js"

export default class Avatar extends AbstractControllers {
    constructor(cls) {
        super(cls)
    }

    optInit(btnName) {
        const page = (btnName === 'new' ? 'avatar/add' : 'avatar/list')
        this.showPage({
            page,
            fn: (elem) => {
                this.setButtons({ elem })
                if (btnName === 'new') this.view.showAvatar()
                if (btnName === 'list') this.#checkAvatar(elem)
            }
        })
    }

    btnAction({ btn, elem }) {
        switch (btn.target.value) {
            case 'back':
                this.btnBack('avatar')
                break
            case 'clear':
                this.btnClean('#avatar')
                this.view.cleanImg('#thumb_image')
                break
            case 'save':
                this.view.submit({
                    form: '#avatar form',
                    fn: ({ validate, formData }) => {
                        let resp
                        if (validate) {
                            resp = this.getDataFile({
                                method: 'POST',
                                url: 'avatar/save',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.btnClean('#avatar')
                                this.view.cleanImg('#thumb_image')
                            }
                        } else {
                            resp = '<span class="warning">This field is necessary!</span>'
                        }
                        this.message({ msg: resp })
                        this.view.loading.hide()
                    }
                })
                break
            case 'edit':
                const formData = this.view.getAvatarSelected(elem)
                if (formData === null) {
                    this.view.loading.hide()
                    return this.message({
                        msg: '<span class="warning">No Selected breed and cetegory</span>'
                    })
                }
                const idAvatar = this.view.getImgSelectedInCarousel()
                if (idAvatar != null) {
                    this.#edition(formData, idAvatar)
                } else {
                    this.message({
                        msg: '<span class="warning">There is no avatar figure</span>'
                    })
                }
                this.view.loading.hide()
                break
        }
    }

    #checkAvatar(elem) {
        this.view.correctionDropdownMenu()
        this.view.checkAvatar({
            elem,
            fn: (formData) => {
                if (formData === null) return
                const list =  this.getDataFile({
                    method: 'POST',
                    url: 'avatar',
                    formData
                })
                this.view.carousel({
                    idElement: '.avatar',
                    list
                })
                this.view.loading.hide()
            }
        })
    }

    #edition(formData, idAvatar) {
        formData.append('id', idAvatar)
        this.openModal({
            page: 'avatar/edit',
            formData,
            fn: () => {
                this.view.setBtnModal({
                    buttons: '<button class="btn btn-rpg btn-silver" value="delete">Excluir</button><button class="btn btn-danger btn-rpg" value="save">Salvar</button>',
                    fn: ({ e, formData }) => {
                        let resp
                        if (e.target.value === 'delete') {
                            this.confirm({
                                title: 'MODO DE EXCLUSÃO',
                                message: 'Deseja realmente excluir este AVATAR?',
                                fn: ({ e }) => {
                                    if (e.target.value === 'yes') {
                                        idAvatar = formData.get('id')
                                        resp = this.getDataFile({
                                            method: 'POST',
                                            url: 'avatar/delete',
                                            formData
                                        })
                                    }
                                    if (resp.indexOf('success') !== -1) {
                                        this.optInit('list')
                                        this.message({ msg: resp })
                                        this.view.closeAllModal()
                                    }
                                }
                            })
                        }
                        if (e.target.value === 'save') {
                            resp = this.getDataFile({
                                method: 'POST',
                                url: 'avatar/save',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                if (formData.get('image').size !== 0) {
                                    resp = '<span class="warning">It is necessary reload this page</span>'
                                }
                                this.optInit('list')
                                this.message({ msg: resp })
                                this.view.closeModal()
                            }
                        }
                    }
                })
                this.eventInModal({
                    idForm: '#form_avatar',
                    events: [ 'change' ],
                    fn: ({ e }) => {
                        let attr = e.target.attributes['type']
                        if (typeof(attr) !== 'undefined' && attr.value === 'file') {
                            this.view.thumbImage({
                                origin: '#image',
                                destination: '#thumb_image'
                            })
                        }
                    }
                })
            }
        })
    }
}