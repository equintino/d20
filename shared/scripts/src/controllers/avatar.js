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
                if (btnName === 'new') this.view.showAvatar()
                if (btnName === 'list') this.#checkAvatar(elem)
            }
        })
    }

    btnAction({ btn, elem }) {
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
            case 'edit':
                const formData = this.view.getAvatarSelected(elem)
                if (formData === null) {
                    this.view.loading.hide()
                    return this.message({
                        msg: '<span class="warning">No Selected breed and cetegory</span>'
                    })
                }
                const idAvatar = this.view.getImgSelectedInCarousel()
                this.#edition(formData, idAvatar)
                this.view.loading.hide()
                break
        }
    }

    #checkAvatar(elem) {
        this.view.checkAvatar({
            elem,
            fn: (formData) => {
                if (formData === null) return
                const list =  this.getDataFile({
                    method: 'POST',
                    url: 'avatar',
                    formData
                })
                this.view.carousel({
                    idElement: '.avatar',
                    list
                })
                this.view.loading.hide()
            }
        })
    }

    #edition(formData, idAvatar) {
        formData.append('id', idAvatar)
        this.openModal({
            page: 'avatar/edit',
            formData,
            fn: (data) => {
                console.log(
                    data
                )
            }
        })
    }
}