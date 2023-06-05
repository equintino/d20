import AbstractViews from './abstractviews.js'

export default class Breed extends AbstractViews {
    constructor() {
        super()
    }

    changeFile(elem) {
        elem.querySelector('[type=file]').onchange = (e) => {
            this.thumbImage({
                origin: '#image',
                destination: '#thumb_image',
                params: {
                    height: '280px'
                }
            })
        }
    }
}