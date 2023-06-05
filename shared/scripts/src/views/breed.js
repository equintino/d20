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

    cleanImg(idElement) {
        document.querySelector(idElement).src = ''
    }

    updateDataBreed({ btn }) {
        let idImage = btn.target.attributes['data-image_id'].value
        this.btnActive({ e: btn })
        document.querySelector('#avatar').innerHTML = `<img src="image/id/${idImage}" alt="" />`
    }

    edition(elem) {
        const btnActive = elem.querySelector('.left .active')
        const formData = new FormData()
        if (btnActive === null) {
            return '<span class="warning">No Breed active</span>'
        }
        formData.append('id', elem.querySelector('.left .active').attributes['data-id'].value)
        return formData
    }
}