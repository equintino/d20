import AbstractViews from './abstractviews.js'
import Message from './../../lib/message.js'
import Modal from './../../lib/modal.js'

export default class Character extends AbstractViews {

    constructor() {
        super()
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
        this.modal = new Modal("#avatarList")
        this.modal.openModal("#boxe_main", page, (e) => {

        })
        this.modal.buttons('<button class="btn btn-rpg btn-danger" value="selected">Selecionar</button>', (e) => {
            let btnName = e.target.value
            if (btnName === 'selected') {
                let breed = document.querySelector(this.modal.id + ' [name=idBreed]')
                let description = breed.selectedOptions[0].attributes['data-description'].value
                let idBreed = breed.value
                let breedName = breed.selectedOptions[0].innerText
                let idCategory = document.querySelector(this.modal.id + ' [name=idCategory]').value
                let idImage = document.querySelector(this.modal.id + ' [name=image_id]').value

                response({
                    idBreed,
                    description,
                    breedName,
                    idCategory,
                    idImage
                })
            }
        })

        if (typeof(fn) === 'function') fn()
    }

    updateCategory(category) {
        document.querySelector(`${this.modal.id} [name=description]`)
            .innerHTML = category.description
    }

    avatarSelected(data) {
        document.querySelector('.breed').attributes['data-id'].value = data.idBreed
        document.querySelector('.breed').innerText = data.breedName.toUpperCase()
        document.querySelector('#myClass').value = data.idCategory
        document.querySelector('#description p').innerHTML = data.description
        document.querySelector('#avatar').innerHTML = `<img src=image/id/${data.idImage} alt="" height="350px"/>`
    }
}