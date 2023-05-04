export default class AbstractControllers {
    view
    service

    constructor({ view, service }) {
        this.view = view
        this.service = service
    }

    init() {
        this.view.setButtons((btnName) => {
            this.optInit(btnName)
        })
    }

    showPage(page, fn) {
        this.view.showPage(this.service.open('GET', page), fn)
    }

    setButton(elem) {
        elem.querySelectorAll('button').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                this.view.loading.show()
                e.preventDefault()
                let btnName = e.target.value
                this.btnAction(btnName)
            })
        })
    }

    openModal(page, params, fn) {
        this.view.openModal(this.service.open('POST', page, params), params, fn)
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