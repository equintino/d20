import AbstractViews from './abstractviews.js'
import Carousel from './../../lib/carousel.js'
import Message from './../../lib/message.js'
import Modal from './../../lib/modal.js'

export default class Character extends AbstractViews {
    #modal

    constructor() {
        super()
        this.#modal = new Modal()
    }

    carousel(id, list, fn) {
        const carousel = new Carousel(id, list)
        const items = document.querySelector(id).firstChild.children

        if (typeof(fn) === 'function') fn({
            id: carousel.dataId,
            items
        })
        document.querySelector(id).addEventListener('click', () => {
            if (typeof(fn) === 'function') fn({
                id: carousel.dataId,
                items
            })
        })
    }

    setDetails({ id, items }) {
        for (let item of items) {
            if (item.attributes['data-id'].value === id) {
                document.querySelector('#description p').innerHTML = item.attributes['data-description'].value
                document.querySelector('.breed').innerHTML = item.attributes['data-name'].value.toUpperCase()
                document.querySelector('.breed').setAttribute('data-id', item.attributes['data-id'].value)
            }
        }
    }

    changeCategory(fn) {
        document.querySelector('#myClass').addEventListener('change', (e) => {
            let idCategory = e.target.value
            let breed = document.querySelector('.breed')
            if (typeof(breed.attributes['data-id']) === 'undefined') {
                e.target.value = ''
                return Message.alertLatch('Need choose your breed first', 'var(--cor-warning)')
            }
            let formData = new FormData()
            formData.append('idBreed', breed.attributes['data-id'].value)
            formData.append('idCategory', idCategory)
            fn(formData)
        })
    }

    openModal(page, params, fn, response) {
        this.#modal = new Modal("#avatarList")
        this.#modal.openModal("#boxe_main", page, (e) => {
            // console.log(
            //     e
            // )
            // let formData = new FormData(e.target)
            // for (let i in params) {
            //     formData.append(i, params[i])
            // }
            // response(formData)
        })

        // this.#groups = this.#modal.getBox().querySelector('[name=group_id]')
        if (typeof(fn) === 'function') fn()
    }

    updateCategory(category) {
        document.querySelector(`${this.#modal.id} [name=description]`)
            .innerHTML = category.description
    }

    eventInModal(event, fn) {
        const idModal = document.querySelector(this.#modal.id)
        idModal.addEventListener(event, (e) => {
            fn(new FormData(idModal))
        })
    }

    closeModal() {
        this.#modal.close()
    }
}