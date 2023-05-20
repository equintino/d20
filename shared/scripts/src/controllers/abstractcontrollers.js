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

    showPage({ page, fn }) {
        this.view.showPage({
            page: this.service.open({
                method: 'GET',
                url: page
            }),
            fn
        })
    }

    setButtons({ elem, fn }) {
        elem.querySelectorAll('button').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.preventDefault()
                let btnActive = elem.querySelector('.left button.active')
                this.view.loading.show()
                this.btnAction({ btn: e })
                if (typeof(fn) === 'function') fn({ btnActive, e })
            })
        })
    }

    openModal({ page, formData, fn, box }) {
        this.view.openModal({
            page: this.service.open({
                method: 'POST',
                url: page,
                formData
            }),
            formData,
            fn,
            box
        })
    }

    /** @idElement string
     * @events array
     * @fn function
     */
    eventInModal({ idElement, events, fn }) {
        for (let event of events) {
            this.view.eventInModal({ idElement, event, fn })
        }
    }

    openFile(data) {
        return (this.service.open({
            method: (data.method ?? 'POST'),
            url: data.url,
            formData: data.formData
        }))
    }

    getDataFile(data) {
        return JSON.parse(this.service.open({
            method: 'POST',
            url: data.url,
            formData: data.formData
        }))
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