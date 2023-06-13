import utils from "./../../lib/utils.js"
import ThumbImage from "../../lib/thumbImage.js"
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

    showPage({ page, fn }) {
        Views.showPage({ page, fn })
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

    /**
     * @e btn click
     * add class active
     */
    btnActive({ e }) {
        const elem = e.target.parentElement
        const btnActive = elem.querySelector('.active')
        if (elem.classList.value.indexOf('btnSelection') !== -1) {
            if (btnActive !== null) btnActive.classList.remove('active')
            e.target.classList.add('active')
            return e
        }
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
        let checked = 0
        for (let i of data.querySelectorAll('[type=radio]')) {
            if (i.checked) checked ++
        }
        if (data.querySelector('[type=radio]') !== null && checked == 0) {
            data.querySelector('[type=radio]').parentElement.style.border = '1px solid pink'
            resp = false
        }
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
        const carousel = new Carousel(data)
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
            if (typeof(data.fn) === 'function') func()
        }
    }

    imgSelected({ idElement, idImage }) {
        document.querySelector(`${idElement} [name=image_id]`)
            .value = idImage
    }

    getImgSelectedInCarousel() {
        let idImg
        document.querySelectorAll('#cards_ .card_').forEach((i) => {
            if (i.style.zIndex === '1') {
                idImg = i.attributes['data-id'].value
            }
        })
        return idImg
    }

    openModal({ box, page, title, message, fn }) {
        const _box = (box ?? '#boxe_main')
        this.modal.openModal(_box, page, (e) => {
            let formData = new FormData(e.target)
            for (let i in params) {
                formData.append(i, params[i])
            }
            response(formData)
        }, title, message)
        if (typeof(fn) === 'function') fn(this.modal.getBox())
    }

    autoFocusModal(name) {
        document.querySelector(`#boxe_main [name='${name}']`).focus()
    }

    setBtnModal({ buttons, fn, box }) {
        this.modal.buttons(buttons, (data) => {
            if (typeof(fn) === 'function') fn(data)
        }, box)
    }

    eventInModal({ idForm, event, fn }) {
        const idModal = document.querySelector(idForm)
        idModal.addEventListener(event, (e) => {
            const formData = new FormData(idModal)
            fn({ e, formData })
        })
    }

    closeModal(data) {
        let _data = (data ?? {})
        this.modal.close(_data)
        if (typeof(data) !== 'undefined' && typeof(data.fn) === 'function') data.fn()
    }

    closeAllModal(fn) {
        this.modal.close({ all: 'all' })
        if (typeof(fn) === 'function') fn()
    }

    /**
     * @param {origin, destination} string
     * @returns setImg{height, width}
     * @params object { height, width }
     */
    thumbImage({ origin, destination, params }) {
        const thumbImage = new ThumbImage({ origin, destination })
        if (typeof(parems) !== 'undefined') thumbImage.setImg(params)
    }
}