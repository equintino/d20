import AbstractControllers from "./abstractcontrollers.js"

export default class Mission extends AbstractControllers {
    constructor(cls) {
        super(cls)
    }

    optInit(btnName) {
        let page = (btnName === 'new' ? 'mission/add' : 'mission/list')
        this.showPage({
            page,
            fn: (elem) => {
                this.setButtons({
                    elem,
                    fn: ({ btnActive, e }) => {
                        this.view.btnActive({ e })
                        let btnValue = e.target.value
                        if (btnActive === null && (btnValue === 'edit' || btnValue === 'include')) {
                            this.view.loading.hide()
                            return this.message({ msg: '<span class="warning">No mission selected</span>'})
                        }
                        if (btnValue === 'edit') this.#edition({ btnActive, e })
                        if (btnValue === 'include') this.#include({ btnActive, e })
                    }
                })
            }
        })
    }

    btnAction({ btn, elem }) {
        let btnName = btn.target.value
        switch (btnName) {
            case 'back':
                this.showPage({
                    page: 'mission',
                    fn: (elem) => {
                        this.view.backInit(elem, (btnName) => {
                            this.optInit(btnName)
                        })
                    }
                })
                break
            case 'save':
                this.view.submit({
                    form: '#mission form',
                    fn: ({ formData, validate }) => {
                        if (validate) {
                            let resp = this.openFile({
                                    url: 'mission/save',
                                    formData
                                })
                            if (resp.indexOf('success') !== -1) {
                                resp = '<span class="success">File successful!!!</span>'
                                this.optInit('new')
                            }
                            this.message({ msg: resp })
                        }
                        this.view.loading.hide()
                    }
                })
                break
            case 'clear':
                this.btnClean('#mission')
                break
            case 'map':
                this.#editMap({ elem })
                break
            case 'edit': case 'include':
                break
            default:
                this.#activeMission({ e: btn })
        }
    }

    #activeMission({ e }) {
        const idMission = e.target.value

        const formData = new FormData()
        formData.append('id', idMission)

        const mission = this.getDataFile({ url: `mission/id/${idMission}` })
        mission.maps= this.getDataFile({
            url: `map/load`,
            formData
        })

        formData.append('nameMission', e.target.innerText)
        mission.personages = this.getDataFile({ url: `mission/personages`, formData })

        this.view.setDetailMission({
            mission
        })
        this.view.loading.hide()
    }

    #editMap({ elem }) {
        const formData = this.view.getMapSelected({ elem })
        const btnActive = this.view.btnActiveSelected({ elem })
        if (btnActive === null) {
            this.view.loading.hide()
            return this.message({
                msg: '<span class="warning">No Mission selected</span>'
            })
        }
        if (formData) {
            this.#mapModal({ formData, btnActive })
        } else {
           this.#addMap({ btnActive })
        }
    }

    #addMap({ btnActive }) {
        const formData = new FormData()
        formData.append('mission', btnActive.value)
        this.openModal({
            page: 'map/add',
            formData,
            fn: () => {
                this.view.loading.hide()
            }
        })
        this.view.setBtnModal({
            buttons: '<button class="btn btn-rpg btn-danger">Salvar</button>',
            fn: ({ formData }) => {
                const resp = this.getDataFile({
                    url: 'map/save',
                    formData
                })
                if (resp.indexOf('success') !== -1) {
                    this.view.closeModal()
                    this.message({ msg: resp })
                    this.optInit('mission/list')
                }
            }
        })
        this.view.eventInModal({
            idForm: '#form_map',
            event: 'change',
            fn: ({ e, formData }) => {
                const type = e.target.attributes['type']
                if (typeof(type) !== 'undefined' && type.value === 'file') {
                    this.view.thumbImage({
                        origin: '#image',
                        destination: '#thumb_image',
                        params: {
                            height: '200px'
                        }
                    })
                }
            }
        })
    }

    #mapModal({ formData, btnActive }) {
        formData.append('mission_id', btnActive.attributes['data-id'].value)
        const buttons = "<button class='btn btn-rpg btn-silver' value='delete'>"
            + "Excluir</button><button class='btn btn-rpg btn-info' "
            + "value='add'>Novo</button>"
            + "<button class='btn btn-rpg btn-danger' value='save'>Salvar</button>"
        this.openModal({
            page: 'map/edit',
            formData,
            fn: () => {
                this.view.loading.hide()
            }
        })
        this.view.setBtnModal({
            buttons,
            fn: ({ e, formData }) => {
                if (e.target.value === 'save') {
                    const resp = this.getDataFile({
                        url: 'map/save',
                        formData
                    })
                    if (resp.indexOf('success') !== -1) {
                        this.view.closeModal()
                        this.message({
                            msg: '<span class="warning">Recharge the page to update the map</span>'
                        })
                    }
                } else if (e.target.value === 'delete') {
                    this.confirm({
                        title: 'Modo de Exclusão',
                        message: 'Deseja realmente excluir este MAPA?',
                        fn: ({ e }) => {
                            if (e.target.value === 'yes') {
                                const resp = this.getDataFile({
                                    method: 'POST',
                                    url: 'map/delete',
                                    formData
                                })
                                if (resp.indexOf('success') !== -1) {
                                    this.view.closeAllModal()
                                    this.optInit('mission/list')
                                }
                            }
                        }
                    })
                } else {
                    this.#addMap({ btnActive })
                }
            }
        })
        this.eventInModal({
            idForm: '#form_map',
            events: [ 'change' ],
            fn: () => {
                this.view.thumbImage({
                    origin: '#image',
                    destination: '#thumb_image',
                    params: {
                        height: '200px'
                    }
                })
            }
        })
    }

    #edition({ btnActive }) {
        const idMission = btnActive.attributes['data-id'].value
        const buttons = "<button class='btn btn-rpg btn-silver mr-1' value='delete'>"
            + "Excluir</button><button class='btn btn-rpg btn-green' "
            + "value='save'>Salvar</button>"
        const formData = new FormData()

        formData.append('id', idMission)
        this.openModal({
            page: `mission/edit`,
            formData
        })
        this.view.setBtnModal({
            buttons,
            fn: (data) => {
                const btnName = data.e.target.value
                let resp
                if (btnName === 'save') {
                    resp = this.openFile({
                        url: 'mission/update',
                        formData: data.formData
                    })
                    if (resp.indexOf('success') !== -1) {
                        this.message({ msg: resp })
                        this.view.closeModal()
                        this.optInit('mission/list')
                    }
                } else if (btnName === 'delete') {
                    let personages = this.getDataFile({
                        url: `mission/personages`,
                        formData
                    })
                    if (personages.length > 0) {
                        return this.message({ msg: '<span class="warning">Ongoing mission</span>' })
                    }
                    this.confirm({
                        title: 'Modo de Exclusão',
                        message: 'Deseja realmente excluir esta Missão?',
                        fn: ({ e }) => {
                            let resp
                            if (e.target.value === 'yes') {
                                resp = this.getDataFile({
                                    url: 'mission/delete',
                                    formData
                                })
                                if (resp.indexOf('success') !== -1) {
                                    this.optInit('mission/list')
                                    this.view.closeAllModal()
                                }
                                this.message({ msg: resp })
                            }
                        }
                    })
                }
            },
        })
        this.view.loading.hide()
    }

    #include({ btnActive, e }) {
        /** Request into a mession */
        const idMission = btnActive.attributes['data-id'].value
        const formData = new FormData()
        formData.append('mission_id', idMission)
        formData.append('act', 'missionRequest')
        this.openModal({
            title: 'SELECIONE UM PERSONAGEM',
            page: 'missionRequest/init',
            formData,
            fn: () => {
                this.view.loading.hide()
            }
        })
        this.view.setBtnModal({
            buttons: '<button class="btn btn-rpg btn-danger" value="confirm">Confirmar</button>',
            fn: ({ formData }) => {
                if (formData.get('character_id') === null) {
                    return this.message({
                        msg: '<span class="warning">No character was selected</span>'
                    })
                }
                const resp = this.getDataFile({
                    method: 'POST',
                    url: 'missionRequest/request',
                    formData
                })
                if (resp.indexOf('success') !== -1) {
                    this.message({ msg: resp })
                    return this.view.closeModal()
                }
                this.message({ msg: resp })
            }
        })
    }
}