import AbstractControllers from "./abstractcontrollers.js"

export default class Shield extends AbstractControllers {
    constructor(cls) {
        super(cls)
        this.view.init((btn) => {
            this.setButton(btn)
        })
    }

    setButton({ e, btnName }) {
        const btnActive = this.view.getBtnActive()
        this.view.loading.show()
        switch(btnName) {
            case 'add':
                this.#add()
                break
            case 'delete':
                if (btnActive === null) {
                    this.view.loading.hide()
                    return this.message({
                        msg: '<span class="warning">No group selected</span>'
                    })
                }
                this.confirm({
                    title: 'MODO DE EXCLUSÃO',
                    message: `Deseja realmente excluir este grupo?(${btnActive.innerText})`,
                    fn: ({ e }) => {
                        if (e.target.value === 'yes') {
                            const id = btnActive.value
                            const formData = new FormData()
                            formData.append('id', id)
                            let resp = this.getDataFile({
                                method: 'POST',
                                url: 'group/delete',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.view.closeAllModal()
                                this.showPage({
                                    page: 'shield',
                                    fn: () => {
                                        this.view.init((btn) => {
                                            this.setButton(btn)
                                        })
                                    }
                                })
                            }
                            this.message({ msg: resp })
                        }
                    }
                })
                this.view.loading.hide()
                break
            case 'save':
                if (btnActive !== null) {
                    const formData = this.view.getAllCheck()
                    formData.append('id', this.view.getBtnActive().attributes['data-id'].value)
                    let resp = this.getDataFile({
                        method: 'POST',
                        url: 'group/update',
                        formData
                    })
                    if (resp.indexOf('success') !== -1) {
                        this.message({ msg: resp })
                    }
                }
                this.view.loading.hide()
                break
            default:
                this.#groups(e)
        }
    }

    #add() {
        this.openModal({
            title: 'ADIÇÃO DE GRUPO',
            page: 'group/add',
            fn: (elem) => {
                this.view.setFocus({
                    elem,
                    property: '[name=name]'
                })
                this.view.loading.hide()
            }
        })
        this.view.setBtnModal({
            buttons: '<button class="btn btn-rpg btn-danger" value="save">Salvar</button>',
            fn: ({ e, formData }) => {
                if (e.target.value === 'save') {
                    let resp = this.getDataFile({
                        before: () => {
                            this.view.loading.show()
                        },
                        method: 'POST',
                        url: 'group/save',
                        formData
                    })
                    if (resp.indexOf('success') !== -1) {
                        this.view.closeAllModal()
                        this.showPage({
                            page: 'shield',
                            fn: () => {
                                this.view.init((btn) => {
                                    this.setButton(btn)
                                })
                            }
                        })
                    }
                    this.message({ msg: resp })
                    this.view.loading.hide()
                }
            }
        })
    }

    #groups(e) {
        const formData = new FormData()
        formData.append('id', e.target.value)
        this.view.btnActive({ e })

        const access = this.getDataFile({
            method: 'POST',
            url: 'group/access',
            formData
        })
        this.view.screenCheck(access)
        this.view.loading.hide()
    }
}