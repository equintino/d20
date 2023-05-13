import utils from "./../../lib/utils.js"
import Views from "./views.js"
import Carousel from "./../../lib/carousel.js"
import Modal from "./../../lib/modal.js"
import Message from "./../../lib/message.js"

const loading = utils.loading
export default class AbstractViews {
    buttons
    modal
    loading

    constructor() {
        this.loading = loading
        this.buttons = document.querySelectorAll('#init button')
        this.modal = new Modal()
    }

    message(msg, background) {
        Message.alertLatch(msg, background)
    }

    showPage(page, fn) {
        Views.showPage(page, fn)
    }

    setButtons(fn) {
        this.buttons.forEach((btn) => {
            btn.onclick = (e) => {
                loading.show()
                fn(e.target.value)
            }
        })
    }

    setFocus({ elem, property }) {
        elem.querySelector(property).focus()
    }

    backInit(elem, fn) {
        elem.querySelectorAll('#init button').forEach((btn) => {
            btn.onclick = (e) => {
                fn(e.target.value)
            }
        })
    }

    reset(form, fn) {
        document.querySelector(form).reset()
        document.querySelectorAll(form + ' [required]').forEach((e) => {
            e.style.background = '#333'
            e.style.color = '#fff'
        })
        if (typeof(fn) === 'function') fn()
    }

    submit({ form, fn }) {
        let data = document.querySelector(form)
        let formData = new FormData(data)
        if (typeof(fn) === 'function') fn({
            formData,
            validate: this.#validate(data)
        })
    }

    #validate(data) {
        let field
        let resp = true
        for (let i in data.querySelectorAll('[required]')) {
            field = data.querySelectorAll('[required]')[i]
            if (typeof(field.value) === 'undefined') break
            if (field.value.trim() === '') {
                field.style.background = 'pink'
                field.style.color = 'rgb(48, 48, 48)'
                field.focus()
                resp = false
                break
            }
        }
        return resp
    }

    carousel(data) {
        const carousel = new Carousel(data.idElement, data.list)
        const items = document.querySelector(data.idElement).firstChild.children
        const func = () => {
            data.fn({
                id: carousel.element.attributes["data-id"].value,
                idImage: carousel.element.attributes["data-idImage"].value,
                items
            })
        }
        if (typeof(data.fn) === 'function') func()
        document.querySelector(data.idElement).onclick = () => {
            if (typeof(func) === 'function') func()
        }
    }

    imgSelected(data) {
        document.querySelector(`${data.idElement} [name=image_id]`)
            .value = data.idImage
    }

    openModal(data) {
        const box = (data.box ?? '#boxe_main')
        this.modal.openModal(box, data.page, (e) => {
            let formData = new FormData(e.target)
            for (let i in params) {
                formData.append(i, params[i])
            }
            response(formData)
        }, data.title, data.message)
        if (typeof(data.fn) === 'function') data.fn(this.modal.getBox())
    }

    autoFocusModal(name) {
        document.querySelector(`#boxe_main [name='${name}']`).focus()
    }

    setBtnModal({ buttons, fn, box }) {
        this.modal.buttons(buttons, (e, form) => {
            if (typeof(fn) === 'function') fn(e, form)
        }, box)
    }

    eventInModal({ idElement, event, fn }) {
        const idModal = document.querySelector(idElement)
        idModal.addEventListener(event, (e) => {
            fn({
                e,
                formData: new FormData(idModal)
            })
        })
    }

    closeModal(data) {
        this.modal.close()
        if (typeof(data) !== 'undefined' && typeof(data.fn) === 'function') data.fn()
    }

    closeAllModal(fn) {
        this.modal.close(null, null, 'all')
        if (typeof(fn) === 'function') fn()
    }
}