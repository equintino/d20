import utils from "./../../lib/utils.js"
import Views from "./views.js"
import Carousel from "./../../lib/carousel.js"
import Modal from "./../../lib/modal.js"
import Message from "../../lib/message.js"

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
            btn.addEventListener('click', (e) => {
                loading.show()
                fn(e.target.value)
            })
        })
    }

    backInit(elem, fn) {
        elem.querySelectorAll('#init button').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                fn(e.target.value)
            })
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

    submit(form, fn) {
        let data = document.querySelector(form)
        let formData = new FormData(data)
        let field
        for (let i in data.querySelectorAll('[required]')) {
            field = data.querySelectorAll('[required]')[i]
            if (typeof(field.value) === 'undefined') break
            if (field.value.trim() === '') {
                field.style.background = 'pink'
                field.style.color = 'rgb(48, 48, 48)'
                field.focus()
                break
            }
        }
        if (typeof(fn) === 'function') fn(formData)
    }

    carousel(id, list, fn) {
        const carousel = new Carousel(id, list)
        const items = document.querySelector(id).firstChild.children

        if (typeof(fn) === 'function') fn({
            id: carousel.element.attributes["data-id"].value,
            idImage: carousel.element.attributes["data-idImage"].value,
            items
        })
        document.querySelector(id).addEventListener('click', () => {
            if (typeof(fn) === 'function') fn({
                id: carousel.element.attributes["data-id"].value,
                idImage: carousel.element.attributes["data-idImage"].value,
                items
            })
        })
    }

    imgSelected(idImage) {
        document.querySelector(`${this.modal.id} [name=image_id]`)
            .value = idImage
    }

    openModal(page, params, fn, response) {
        this.modal.openModal("#boxe_main", page, (e) => {
            let formData = new FormData(e.target)
            for (let i in params) {
                formData.append(i, params[i])
            }
            response(formData)
        })
        fn()
    }

    autoFocusModal(name) {
        document.querySelector(`#boxe_main [name='${name}']`).focus()
    }

    setBtnModal(buttons, fn) {
        this.modal.buttons(buttons, fn)
    }

    eventInModal(event, fn) {
        const idModal = document.querySelector(this.modal.id)
        idModal.addEventListener(event, (e) => {
            fn(new FormData(idModal))
        })
    }

    closeModal() {
        this.modal.close()
    }
}