import AbstractControllers from "./abstractcontrollers.js"

export default class Avatar extends AbstractControllers {
    constructor(cls) {
        super(cls)
    }

    optInit(btnName) {
        const page = (btnName === 'new' ? 'avatar/add' : 'avatar/list')
        this.showPage({
            page,
            fn: (elem) => {
                this.setButtons({ elem })
                this.view.showAvatar()
            }
        })
    }

    btnAction({ btn }) {
        switch (btn.target.value) {
            case 'back':
                this.btnBack('avatar')
                break
            case 'clear':
                this.btnClean('#avatar')
                this.view.cleanImg('#thumb_image')
                break
            case 'save':
                this.view.submit({
                    form: '#avatar form',
                    fn: ({ validate, formData }) => {
                        let resp
                        if (validate) {
                            resp = this.getDataFile({
                                method: 'POST',
                                url: 'avatar/save',
                                formData
                            })
                            if (resp.indexOf('success') !== -1) {
                                this.btnClean('#avatar')
                                this.view.cleanImg('#thumb_image')
                            }
                        } else {
                            resp = '<span class="warning">This field is necessary!</span>'
                        }
                        this.message({ msg: resp })
                        this.view.loading.hide()
                    }
                })
                break
        }
    }
}