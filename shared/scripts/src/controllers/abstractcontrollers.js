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
        this.showPage(page, (elem) => {
            this.view.backInit(elem, (btnName) => {
                this.optInit(btnName)
            })
        })
    }

    btnClean(id) {
        this.view.reset(`${id} form`, () => {
            this.view.loading.hide()
        })
    }

    showPage(page, fn) {
        this.view.showPage(this.service.open('GET', page), fn)
    }

    setButton(elem, fn) {
        elem.querySelectorAll('button').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.preventDefault()
                let btnActive = elem.querySelector('.left button.active')
                this.view.loading.show()
                this.btnAction(e.target)
                if (typeof(fn) === 'function') fn(btnActive, e)
            })
        })
    }

    openModal(page, formData, fn) {
        this.view.openModal(this.service.open('POST', page, formData), formData, fn)
    }

    openFile(page, formData) {
        return JSON.parse(this.service.open('POST', page, formData))
    }

    message(msg) {
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