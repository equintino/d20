import AbstractControllers from "./abstractcontrollers.js"

export default class Mission extends AbstractControllers {
    constructor(deps) {
        super(deps)
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
                        if (btnActive === null && btnValue === 'edit') {
                            this.view.loading.hide()
                            return this.message({ msg: '<span class="warning">No mission selected</span>'})
                        }
                        if (btnValue === 'edit') this.#edition({ btnActive, e })
                    }
                })
            }
        })
    }

    btnAction({ btn }) {
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
                this.#editMap()
                break
            case 'edit':
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

    #editMap() {
        const maps = document.querySelector('#mission #images #cards_')
        if (maps !== null && maps.children.length > 0) {
            for (let map of maps.children) {
                if (map.style.zIndex == 1) {
                    const nameMap = map.attributes['data-name'].value
                }
            }
        }
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
}