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
                this.setButton({
                    elem,
                    fn: ({ btnActive, e }) => {
                        this.view.btnActive({ e })
                        console.log(
                            btnActive,
                            e
                        )
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
                    }
                })
                break
            case 'clear':
                this.btnClean('#mission')
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
        let maps= this.getDataFile({
            url: `map/load`,
            formData
        })

        formData.append('nameMission', e.target.innerText)
        const personages = this.getDataFile({ url: `mission/personages`, formData })

        let text = ''
        for (const personage of personages) {
            text += `<div><i class='fa fa-circle mr-2' style='font-size: .8em'></i>${personage}</div>`
        }

        let imgs = ''
        for (const map of maps) {
            imgs += `<img data-id='${map.image_id}' src='image/id/${map.image_id}' alt='' height='280px' />`
        }

        document.querySelector('#mission #story').innerHTML = mission.story
        document.querySelector('#mission #personage').innerHTML = text
        document.querySelector('#mission #images').innerHTML = imgs
        document.querySelector('#mission .middle p').innerText = `Total de Maps: ${maps.length}`

        this.view.carousel({
            idElement: '#images',
            list: maps
        })
        this.view.loading.hide()
    }
}