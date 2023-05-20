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
                        if (btnActive === null && e.target.value === 'edit') {
                            this.view.loading.hide()
                            return this.message({ msg: '<span class="warning">No mission selected</span>'})
                        }
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
            case 'edit':
                console.log(
                    btn
                )
                return
                // if (list.querySelector("button.active") !== null) {
                    let mission_id = list.querySelector(".left button.active").attributes["data-id"].value
                    modal.show({
                        title: "Modo de edição de Missão",
                        content: "mission/edit/" + mission_id,
                        buttons: "<button class='btn btn-rpg btn-silver mr-1' value='delete'>"
                            + "Excluir</button><button class='btn btn-rpg btn-green' "
                            + "value='save'>Salvar</button>"
                    })
                    .on("click", function(e) {
                        let formData = new FormData(modal.content.find(form_mission)[0])
                        if (e.target.value === "save") {
                            if (saveData("mission/update", formData)) {
                                modal.hideContent();
                            }
                            $(".content").load("mission/list", function() {
                                act.list()
                                loading.hide()
                            })
                        } else if (e.target.value === "delete") {
                            if (modal.content.find("#personage td").text().length !== 0) {
                                return alertLatch("This mission is happing", "var(--cor-warning)")
                            }
                            modal.confirm({
                                title: "Modo de Exclusão",
                                message: "Deseja realmente excluir esta MISSÂO?"
                            })
                            .on("click", function(i) {
                                if (i.target.value === "1") {
                                    let id = modal.content.find("[name=id]").val()
                                    $.ajax({
                                        url: "mission/delete",
                                        type: "POST",
                                        dataType: "JSON",
                                        data: {
                                            id
                                        },
                                        beforeSend: function() {
                                            loading.show()
                                        },
                                        success: function(response) {
                                            alertLatch("Mission removed successfully", "var(--cor-success)")
                                            modal.hideContent()
                                            $(".content").load("mission/list", function() {
                                                act.list()
                                                loading.hide()
                                            })
                                        },
                                        error: function(error) {
                                            alertLatch(error.responseText)
                                        },
                                        complete: function() {
                                            loading.hide()
                                        }

                                    })
                                }
                            })
                        }
                    })
                // } else {
                //     loading.hide()
                //     alertLatch("No selected mission", "var(--cor-warning)")
                // }
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
}