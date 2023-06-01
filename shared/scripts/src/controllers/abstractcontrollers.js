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
                this.btnAction({ btn: e, elem })
                if (typeof(fn) === 'function') fn({ btnActive, e })
            })
        })
    }

    openModal({ page, formData, fn, box, title }) {
        this.view.openModal({
            page: this.service.open({
                method: 'POST',
                url: page,
                formData
            }),
            formData, fn, box, title
        })
    }

    confirm({ title, message, fn }) {
        this.view.openModal({
            box: '#boxe2_main',
            title, message
        })
        let btn = "<button class='btn btn-rpg btn-silver' "
            + "value='no'>Não</button><button class='btn btn-rpg "
            + "btn-danger' value='yes'>Sim</button>"
        this.view.setBtnModal({
            buttons: btn,
            fn: (data) => {
                if (typeof(fn) === 'function') fn(data)
            },
            box: '#boxe2_main'
        })
    }

    /** @idForm string
     * @events array
     * @fn function
     */
    eventInModal({ idForm, events, fn }) {
        for (let event of events) {
            this.view.eventInModal({ idForm, event, fn })
        }
    }

    openFile(data) {
        return (this.service.open({
            method: (data.method ?? 'POST'),
            url: data.url,
            formData: data.formData
        }))
    }

    /**
     * @method string
     * @url string
     * @formData FormData
     */
    getDataFile(data) {
        const dataFile = this.service.open({
            method: 'POST',
            url: data.url,
            formData: data.formData
        })
        return (JSON.parse(dataFile) ?? null)
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