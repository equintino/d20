import AbstractViews from './abstractviews.js'

export default class Avatar extends AbstractViews {
    constructor() {
        super()
    }

    showAvatar() {
        document.querySelector('#form_avatar [type=file]').onchange = () => {
            this.thumbImage({ origin: '#image', destination: '#thumb_image' })
        }
    }

    cleanImg(idImage) {
        document.querySelector(idImage).src = ''
    }

    checkAvatar({ elem, fn }) {
        elem.querySelector('.left').addEventListener('change', () => {
            this.loading.show()
            if (typeof(fn) === 'function') fn(this.getAvatarSelected(elem))
        })
    }

    getAvatarSelected(elem) {
        const breed = elem.querySelector('#breeds [name=breed]:checked')
        const category = elem.querySelector('#categories [name=category]:checked')
        const formData = new FormData()
        if (breed === null || category === null) {
            this.loading.hide()
            return null
        }
        const idBreed = breed.value
        const idCategory = category.value
        formData.append('breed_id', idBreed)
        formData.append('category_id', idCategory)
        return formData
    }

    correctionDropdownMenu() {
        const dropdown = document.querySelector('#top .dropdown-menu')
        const avatar = document.querySelector('.avatar').style
        dropdown.addEventListener('mouseover', (e) => {
            avatar.zIndex = -1
        })
        dropdown.addEventListener('mouseleave', () => {
            avatar.zIndex = 0
        })
    }
}