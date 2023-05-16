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
                this.#setButton({ elem })
            }
        })
    }

    #setButton({ elem }) {
        elem.querySelectorAll('button').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                let btnName = e.target.value
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
                }
            })
        })
    }
}