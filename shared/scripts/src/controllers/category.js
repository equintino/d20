import AbstractControllers from "./abstractcontrollers.js"

export default class Category extends AbstractControllers {
    constructor(cls) {
        super(cls)
    }

    optInit(btnName) {
        const page = (btnName === 'new' ? 'category/add' : 'category/list')
        this.showPage({
            page,
            fn: (elem) => {
                this.setButtons({
                    elem,
                    fn: (data) => {
                        this.view.btnActive(data)
                    }
                })
                if (btnName === 'new') this.view.changeImg()
            }
        })
    }

    btnAction({ btn }) {
        switch (btn.target.value) {
            case 'back':
                this.btnBack('category')
                break
            case 'clear':
                this.btnClean('#category')
                this.view.cleanImg()
                break
            case 'save':
                this.view.submit({
                    form: '#category form',
                    fn: ({ formData, validate }) => {
                        let resp
                        if (validate) {
                            resp = this.getDataFile({
                                method: 'POST',
                                url: 'category/save',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.btnClean('#category')
                                this.view.cleanImg()
                            }
                        } else {
                            resp = '<span class="warning">This field is necessary</span>'
                        }
                        this.message({ msg: resp })
                        this.view.loading.hide()
                    }
                })
                break
            case 'edit':
                break
            default:
                this.view.updateCategory(btn)
        }
    }
}