export default class AbstractControllers {
    view
    service

    constructor({ view, service }) {
        this.view = view
        this.service = service
    }

    static initializer(cls) {
        cls.init()
    }

    init() {
        this.view.setButtons((btnName) => {
            this.optInit(btnName)
        })
    }

    btnBack(page) {
        this.showPage({
            page,
            fn: (elem) => {
                this.view.backInit(elem, (btnName) => {
                    this.optInit(btnName)
                })
            }
        })
    }

    btnClean(id) {
        this.view.reset(`${id} form`, () => {
            this.view.loading.hide()
        })
    }

    showPage(data) {
        this.view.showPage(this.service.open('GET', data.page), data.fn)
    }

    setButton(data) {
        data.elem.querySelectorAll('button').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.preventDefault()
                let btnActive = data.elem.querySelector('.left button.active')
                this.view.loading.show()
                this.btnAction({ btn: e.target })
                if (typeof(data.fn) === 'function') data.fn({ btnActive, e })
            })
        })
    }

    openModal(data) {
        this.view.openModal({
            page: this.service.open('POST', data.page, data.formData),
            formData: data.formData,
            fn: data.fn
        })
    }

    openFile(data) {
        return JSON.parse(this.service.open('POST', data.page, data.formData))
    }

    message({ msg }) {
        this.view.message(msg, this.background(msg))
    }

    background(resp) {
        if (resp.indexOf('danger') !== -1) {
            return 'var(--cor-danger)'
        }
        if (resp.indexOf('warning') !== -1) {
            return 'var(--cor-warning)'
        }
        return 'var(--cor-success)'
    }
}