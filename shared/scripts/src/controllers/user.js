import AbstractControllers from "./abstractcontrollers.js"

export default class User extends AbstractControllers {
    constructor(cls) {
        super(cls)
    }

    optInit(btnName) {
        const page = (btnName === 'new' ? 'user/add' : 'user/list')
        this.showPage({
            page,
            fn: (elem) => {
                if (btnName === 'new') {
                    const form  = elem.querySelector('form')
                }
                this.setButtons({
                    elem,
                    fn: (data) => {
                        // console.log(
                        //     data
                        // )
                    }
                })
            }
        })
    }

    btnAction({ btn, elem }) {
        switch(btn.target.value) {
            case 'back':
                this.btnBack('user')
                break
            case 'clean':
                this.btnClean('#edit')
                break
            case 'save':
                this.view.submit({
                    form: '#loginRegister',
                    fn: ({ formData, validate }) => {
                        if (validate) {
                            let resp = this.getDataFile({
                                method: 'POST',
                                url: 'user/save',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.btnClean('#edit')
                                resp = '<span class="success">User save successfull</span>'
                            }
                            this.message({ msg: resp })
                        }
                        this.view.loading.hide()
                    }
                })
                break
        }
    }
}