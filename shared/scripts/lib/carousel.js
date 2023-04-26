export default class Carousel {
    #css
    dataId

    constructor(elem, list) {
        this.carousel(elem, list)
    }

    carousel(elem, list) {
        this.#styles()
        let listImg = document.querySelector(elem)

        let items = []
        let htmls = '<div id="cards_">'
        for (let i in list) {
            items.push(parseInt(i) + 1)
            htmls += `<label class="card_" id="item-${parseInt(i) + 1}" data-name="${list[i].name}" data-id="${list[i].id}" data-description="${list[i].description}" ><img src="image/id/${list[i].image_id}" alt="${list[i].name}"></label>`
        }
        htmls += '</div>'

        listImg.innerHTML = htmls
        let cards = listImg.querySelector('#cards_')

        let arrCards = []

        for (let i of items) {
            arrCards.push(cards.querySelector(`#item-${i}`))
        }

        for (let i in arrCards) {
            switch (i) {
                case '0':
                    arrCards[i].style = this.#css.left
                    break
                case '1':
                    arrCards[i].style = this.#css.middle
                    this.dataId = arrCards[i].attributes['data-id'].value
                    break
                case '2':
                    arrCards[i].style = this.#css.right
                    break
                default:
                    arrCards[i].style = this.#css.other
            }
        }

        cards.addEventListener('click', () => {
            let arr = this.#direction(arrCards, true)
            arr[0].style = this.#css.left
            arr[1].style = this.#css.middle
            arr[2].style = this.#css.right
            arr[3].style = this.#css.other
            arrCards = arr
            this.dataId = arr[1].attributes['data-id'].value
        })
    }

    #direction(arr, asc) {
        let pos = []
        let arrNew = []
        for (let i in arr) {
            if (asc) {
                i = (i == arr.length - 1 ? 0 : parseInt(i) + 1)
            } else {
                i = (i == 0 ? arr.length - 1 : parseInt(i) - 1)
            }
            pos.push(i)
        }
        for (let x = 0; x < pos.length; x++) {
            arrNew.push(arr[pos[x]])
        }
        return arrNew
    }

    #styles() {
        this.#css = {
            left: 'transform: translatex(-60%) scale(0); opacity: .3; z-index: 0;',
            middle: 'transform: translatex(0) scale(1);opacity: 1;z-index: 1;',
            right: 'transform: translatex(60%) scale(.4);opacity: .3;z-index: 0;',
            other: 'transform: translatex(60%) scale(.4);opacity: 0;z-index: 0;'
        }
    }
}