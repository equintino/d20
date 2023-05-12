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

    changeCategory({ fn }) {
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
            if (typeof(fn) !== 'undefined') fn(formData)
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

    updateCategory({ idElement, category }) {
        document.querySelector(`${idElement} [name=description]`)
            .innerHTML = category.description
    }

    avatarSelected({ form, fn }) {
        document.querySelector('.breed').attributes['data-id'].value = form.idBreed.value
        document.querySelector('#myCharacter [name=breed_id]').value = form.idBreed.value
        document.querySelector('.breed').innerText = form.idBreed.selectedOptions[0]['text'].toUpperCase()
        document.querySelector('#description p').innerHTML = form.idBreed.selectedOptions[0].attributes['data-description'].value
        document.querySelector('#myClass').value = form.idCategory.value
        document.querySelector('#myCharacter [name=image_id]').value = form.image_id.value
        document.querySelector('#avatar').parentElement.innerHTML = `<div id='avatar'><img src=image/id/${form.image_id.value} alt="" height="350px" /></div>`
        if (typeof(fn) === 'function') fn()
    }

    changeAvatar({ fn }) {
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

    setStory({ form }) {
        document.querySelector('#character [name=story]').value = form.querySelector('[name=story]').value
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

    setCategory(category) {
        document.querySelector('#detail_class').innerHTML = `<img src='image/id/${category.image_id}' alt='' height='50px' title='${category.name}'/>`
    }

    setBreed(breed) {
        document.querySelector('#detail_breed').innerHTML = `<img src='image/id/${breed.image_id}' alt='' height='100px' title='${breed.name}'/>`
    }

    setMission(mission) {
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
        let breed_id = btnActive.attributes["data-breed_id"].value
        let category_id = btnActive.attributes["data-category_id"].value
        let story = btnActive.attributes["data-story"].value
        let mission = btnActive.attributes["data-mission"].value
        if (mission !== "") {
            this.loading.hide()
            return this.message("This character is on a mission", "var(--cor-warning)")
        }

        let formData = new FormData()
        formData.append('id', id)
        formData.append('image_id', image_id)
        formData.append('breed_id', breed_id)
        formData.append('category_id', category_id)
        formData.append('story', story)

        return formData
    }
}