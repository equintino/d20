import AbstractControllers from "./abstractcontrollers.js"

export default class Breed extends AbstractControllers {
    constructor(deps) {
        super(deps)
    }

    static initializer(deps) {
        const breed = new Breed(deps)
        breed.#init()
    }

    #init() {
        this.view.setButtons((btnName) => {
            this.optInit(btnName)
        })
    }

    optInit(btnName) {
        let page = (btnName === 'new' ? 'breed/add' : 'breed/list')
        this.showPage({
            page, fn: (elem) => {
                this.setButtons({
                    elem,
                    fn: ({ e }) => {
                        if (e.target.value === 'clear') {
                            elem.querySelector('#thumb_image').src = ''
                        }
                    }
                })
                elem.querySelector('[type=file]').onchange = (e) => {
                    this.view.thumbImage({
                        origin: '#image',
                        destination: '#thumb_image',
                        params: {
                            height: '280px'
                        }
                    })
                }
            }
        })
    }

    btnAction(data) {
        const btnName = data.btn.target.value
        switch (btnName) {
            case 'back':
                this.btnBack('breed')
                break
            case 'save':
                this.view.submit({
                    form: '#form_breed',
                    fn: ({ formData }) => {
                        let resp = this.getDataFile({
                            method: 'POST',
                            url: 'breed/save',
                            formData
                        })
                        if (resp.indexOf('success') !== -1) {
                            this.btnClean('#breed')
                            this.message({ msg: resp })
                        }
                    }
                })
                break
            case 'clear':
                this.btnClean('#breed')
                break
        }
    }
}