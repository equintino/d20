import AbstractViews from './abstractviews.js'

export default class Category extends AbstractViews {
    constructor() {
        super()
    }

    changeImg() {
        document.querySelector('#category #image').onchange = () => {
            this.thumbImage({ origin: '#image', destination: '#thumb_image' })
        }
    }

    cleanImg() {
        document.querySelector('#thumb_image').src = ''
    }

    updateCategory(btn) {
        const idImage = btn.target.attributes['data-image_id'].value
        document.querySelector('#symbol img').src = `image/id/${idImage}`
        this.loading.hide()
    }
}