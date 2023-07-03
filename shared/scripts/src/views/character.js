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
                document.querySelector('.description p').innerHTML = item.attributes['data-description'].value
                document.querySelector('.breed').innerHTML = item.attributes['data-name'].value.toUpperCase()
                document.querySelector('[name=breed_id]').value = item.attributes['data-id'].value
                document.querySelector('.breed').setAttribute('data-id', item.attributes['data-id'].value)
            }
        }
    }

    changeCategory({ fn }) {
        document.querySelector('#myClass').addEventListener('change', (e) => {
            this.loading.show()
            let idCategory = e.target.value
            let breed = document.querySelector('.breed')
            if (typeof(breed.attributes['data-id']) === 'undefined'
                || breed.attributes['data-id'].value === '') {
                e.target.value = ''
                let evt = new Event('click')
                document.getElementById('myBreed').dispatchEvent(evt)
                return Message.alertLatch('Need choose your breed first', 'var(--cor-warning)')
            }
            let formData = new FormData()
            formData.append('breed_id', breed.attributes['data-id'].value)
            formData.append('category_id', idCategory)
            if (typeof(fn) !== 'undefined') fn({ formData })
        })
    }

    updateDataModal(idModal, response) {
        let idCategory = document.querySelector(idModal + ' [name=category_id]').value
        let idImage = document.querySelector(idModal + ' [name=image_id]').value

        let breed = document.querySelector(idModal + ' [name=breed_id]')
        let description = breed.selectedOptions[0].attributes['data-description'].value
        let idBreed = breed.value
        let breedName = breed.selectedOptions[0].innerText

        response({ idBreed, description, breedName, idCategory, idImage })
    }

    updateCategory({ idElement, category }) {
        document.querySelector(`${idElement} [name=description]`)
            .innerHTML = category.description
    }

    avatarSelected({ formData, fn, form }) {
        document.querySelector('.breed').attributes['data-id'].value = formData.get('breed_id')
        document.querySelector('#myCharacter [name=breed_id]').value = formData.get('breed_id')
        document.querySelector('.breed').innerText = form.breed_id.selectedOptions[0]['text'].toUpperCase()
        document.querySelector('.description p').innerHTML = form.breed_id.selectedOptions[0].attributes['data-description'].value
        document.querySelector('#myClass').value = formData.get('category_id')
        document.querySelector('#myCharacter [name=image_id]').value = formData.get('image_id')
        document.querySelector('#avatar').parentElement.innerHTML = `<div id='avatar'><img src=image/id/${formData.get('image_id')} alt="" height="350px" /></div>`
        if (typeof(fn) === 'function') fn()
    }

    changeAvatar({ fn }) {
        let formData = new FormData()
        let idCategory = document.querySelector('#myClass').value
        let breed = document.querySelector('.breed')
        let img = document.querySelector('#avatar img')

        formData.append('breed_id', breed.attributes['data-id'].value)
        formData.append('category_id', idCategory)

        img.setAttribute('title', 'clique para trocar avatar')
        img.style.cursor = 'pointer'
        img.style.float = 'right'
        img.onclick = () => {
            fn({ formData })
        }
    }

    removeAvatarSelected() {
        const breed = document.querySelector('.breed')
        breed.attributes['data-id'].value = ''
        breed.innerText = ''
        document.querySelector('[name=breed_id]').value = ''
        document.querySelector('.description > p').innerText = ''
        document.querySelector('#avatar > *').remove()
        document.querySelector('[name=image_id]').value = ''
    }

    setStory({ formData }) {
        document.querySelector('#character [name=story]').value = formData.get('story')
    }

    setBtnCharacter(btn, fn) {
        if (btn.offsetParent.querySelector('.left')) {
            const sideRight = document.querySelector('#character .right')
            let idCharacter = btn.attributes['data-id'].value
            let idBreed = btn.attributes['data-breed_id'].value
            let idCategory = btn.attributes['data-category_id'].value
            let idImage = btn.attributes['data-image_id'].value
            let story = btn.attributes['data-story'].value
            let idMission = btn.attributes['data-mission'].value
            let lines = parseInt(story.length/17) + 2

            sideRight.querySelector('#story p').innerHTML = `<textarea class='input-rpg' disabled rows='${lines}'>${story} </textarea>`
            sideRight.querySelector('#avatar').innerHTML = `<img src='image/id/${idImage}' alt='' height='350px' />`
            if (typeof(fn) === 'function') fn({
                idCharacter,
                idCategory,
                idBreed,
                idMission
            })
            this.loading.hide()
        }
    }

    setCategory({ category }) {
        document.querySelector('#detail_class').innerHTML = `<img src='image/id/${category.image_id}' alt='' height='50px' title='${category.name}'/>`
    }

    setBreed({ breed }) {
        document.querySelector('#detail_breed').innerHTML = `<img src='image/id/${breed.image_id}' alt='' height='100px' title='${breed.name}'/>`
    }

    setMission({ mission }) {
        document.querySelector('#list .breed_class p').innerHTML = `<textarea class='input-rpg' disabled >${(mission.name ?? '')}</textarea>`
    }

    edition() {
        let btnActive = document.querySelector('#list .left button.active')
        if (btnActive === null) {
            this.loading.hide()
            return this.message("Select a character","var(--cor-warning)")
        }
        let id = btnActive.attributes["data-id"].value
        let image_id = btnActive.attributes["data-image_id"].value
        let idBreed = btnActive.attributes["data-breed_id"].value
        let idCategory = btnActive.attributes["data-category_id"].value
        let story = btnActive.attributes["data-story"].value
        let mission = btnActive.attributes["data-mission"].value
        if (mission !== "") {
            this.loading.hide()
            return this.message("This character is on a mission", "var(--cor-warning)")
        }

        let formData = new FormData()
        formData.append('id', id)
        formData.append('image_id', image_id)
        formData.append('breed_id', idBreed)
        formData.append('category_id', idCategory)
        formData.append('story', story)

        return formData
    }

    setAvatarModal({ formData }) {
        let idImage = formData.get('image_id')
        document.querySelector('#myCharacter [name=image_id]').value = idImage
        document.querySelector('#myCharacter img').src = `image/id/${idImage}`
        this.closeModal({
            box: document.querySelector('#boxe2_main')
        })
    }
}