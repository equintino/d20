import AbstractControllers from "./abstractcontrollers.js";

export default class Player extends AbstractControllers {
    constructor(cls) {
        super(cls)
        this.deletePlayer()
    }

    deletePlayer() {
        document.querySelectorAll('#player td[title=Exclui] i').forEach((e) => {
            e.onclick = (e) => {
                const formData = new FormData()
                const id = e.target.parentElement.attributes['data-id'].value
                const player = e.target.parentElement.parentElement.children[1].innerText
                formData.append('id', id)
                this.confirm({
                    title: 'MODO DE EXCLUSÃO',
                    message: `Deseja realmente excluir este jogador? (${player})`,
                    fn: ({ e }) => {
                        if (e.target.value === 'yes') {
                            let resp = this.getDataFile({
                                method: 'POST',
                                url: 'player/delete',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.view.closeAllModal()
                                this.showPage({
                                    page: 'player',
                                    fn: () => {
                                        this.deletePlayer()
                                    }
                                })
                            }
                            this.message({ msg: resp })
                        }
                    }
                })
            }
        })
    }
}