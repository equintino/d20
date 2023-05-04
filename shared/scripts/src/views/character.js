import AbstractViews from './abstractviews.js'
import Message from './../../lib/message.js'

export default class Character extends AbstractViews {

    constructor() {
        super()
    }

    setDetails({ id, items }) {
        document.querySelector('#myClass').value = ''
        for (let item of items) {
            if (item.attributes['data-id'].value === id) {
                document.querySelector('#description p').innerHTML = item.attributes['data-description'].value
                document.querySelector('.breed').innerHTML = item.attributes['data-name'].value.toUpperCase()
                document.querySelector('[name=breed_id]').value = item.attributes['data-id'].value
                document.querySelector('.breed').setAttribute('data-id', item.attributes['data-id'].value)
            }
        }
    }

    changeCategory(fn) {
        document.querySelector('#myClass').addEventListener('change', (e) => {
            this.loading.show()
            let idCategory = e.target.value
            let breed = document.querySelector('.breed')
            if (typeof(breed.attributes['data-id']) === 'undefined') {
                e.target.value = ''
                let evt = new Event('click')
                document.getElementById('myBreed').dispatchEvent(evt)
                return Message.alertLatch('Need choose your breed first', 'var(--cor-warning)')
            }
            let formData = new FormData()
            formData.append('idBreed', breed.attributes['data-id'].value)
            formData.append('idCategory', idCategory)
            fn(formData)
        })
    }

    updateDataModal(idModal, response) {
        let idCategory = document.querySelector(idModal + ' [name=idCategory]').value
        let idImage = document.querySelector(idModal + ' [name=image_id]').value

        let breed = document.querySelector(idModal + ' [name=idBreed]')
        let description = breed.selectedOptions[0].attributes['data-description'].value
        let idBreed = breed.value
        let breedName = breed.selectedOptions[0].innerText

        response({
            idBreed,
            description,
            breedName,
            idCategory,
            idImage
        })
    }

    updateCategory(idModal, category) {
        document.querySelector(`${idModal} [name=description]`)
            .innerHTML = category.description
    }

    avatarSelected(data, fn) {
        document.querySelector('.breed').attributes['data-id'].value = data.idBreed.value
        document.querySelector('.breed').innerText = data.idBreed.selectedOptions[0]['text'].toUpperCase()
        document.querySelector('#description p').innerHTML = data.idBreed.selectedOptions[0].attributes['data-description'].value
        document.querySelector('#myClass').value = data.idCategory.value
        document.querySelector('#myCharacter [name=image_id]').value = data.image_id.value
        document.querySelector('#avatar').parentElement.innerHTML = `<div id='avatar'><img src=image/id/${data.image_id.value} alt="" height="350px" /></div>`
        if (typeof(fn) === 'function') fn()
    }

    changeAvatar(fn) {
        let idCategory = document.querySelector('#myClass').value
        let breed = document.querySelector('.breed')
        let formData = new FormData()
        formData.append('idBreed', breed.attributes['data-id'].value)
        formData.append('idCategory', idCategory)

        let img = document.querySelector('#avatar img')
        img.setAttribute('title', 'clique para trocar avatar')
        img.style.cursor = 'pointer'
        img.onclick = () => {
            fn(formData)
        }
    }

    removeAvatarSelected() {
        document.querySelector('#avatar img').attributes['src'].value = ''
        document.querySelector('[name=image_id]').value = ''
    }

    setStory(form) {
        document.querySelector('#character [name=story]').innerHTML = form.querySelector('[name=story]').value
    }
}