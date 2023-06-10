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
}