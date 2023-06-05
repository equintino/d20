import AbstractControllers from "./abstractcontrollers.js"

export default class Breed extends AbstractControllers {
    constructor(deps) {
        super(deps)
    }

    static initializer(deps) {
        const breed = new Breed(deps)
        breed.#init()
    }

    #init() {
        this.view.setButtons((btnName) => {
            this.optInit(btnName)
        })
    }

    optInit(btnName) {
        let page = (btnName === 'new' ? 'breed/add' : 'breed/list')
        this.showPage({
            page, fn: (elem) => {
                this.setButtons({
                    elem,
                    fn: ({ e }) => {
                        if (e.target.value === 'clear') {
                            elem.querySelector('#thumb_image').src = ''
                        }
                    }
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
            case 'save':
                this.view.submit({
                    form: '#form_breed',
                    fn: ({ formData }) => {
                        let resp = this.getDataFile({
                            method: 'POST',
                            url: 'breed/save',
                            formData
                        })
                        if (resp.indexOf('success') !== -1) {
                            this.btnClean('#breed')
                            this.message({ msg: resp })
                            this.view.cleanImg('#thumb_image')
                        }
                    }
                })
                break
            case 'clear':
                this.btnClean('#breed')
                break
            case 'edit':
                this.#edition(elem)
                return
                let id = avatar.children[0].attributes["data-id"].value
                modal.show({
                    title: "Modo de edição de RAÇAS",
                    content: "breed/edit",
                    params: { id },
                    buttons: "<button class='btn btn-rpg btn-silver mr-1' value='delete'>Excluir</button><button class='btn btn-rpg btn-green' value='save'>Salvar</button>"
                }).on("click", function(e) {
                    if(e.target.value === "save") {
                        let formData = new FormData($(e.target.offsetParent).find("form")[0])
                        if(saveData("breed/save", formData)) {
                            modal.hideContent();
                        }
                    } else if(e.target.value === "delete") {
                        modal.confirm({
                            title: "Modo de Exclusão",
                            message: "Deseja realmente excluir esta RAÇA?"
                        }).on("click", function(i) {
                            if(i.target.value === "1") {
                                let name = modal.content.find("[name=name]").val()
                                $.ajax({
                                    url: "breed/delete",
                                    type: "POST",
                                    dataType: "JSON",
                                    data: {
                                        name
                                    },
                                    beforeSend: function() {
                                        loading.show()
                                    },
                                    success: function(response) {
                                        alertLatch("Breed removed successfully", "var(--cor-success)")
                                        modal.hideContent()
                                        $(".content").load("breed/list", function() {
                                            loading.hide()
                                        })
                                    },
                                    error: function(error) {

                                    },
                                    complete: function() {
                                        loading.hide()
                                    }

                                })
                            }
                        })
                    }
                })
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