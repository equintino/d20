export default class Carousel {
    #elem
    #list

    constructor(elem, list) {
        this.#elem = elem
        this.#list = list
        this.carousel(elem, list)
    }

    carousel(elem, list) {
        const css = this.#css()
        let listImg = document.querySelector(elem)
        // document.querySelector(elem).style = 'display: block'

        // document.querySelector('.card').style = "position: absolute;width: 60%; height: 100%; left: 0;right: 0;margin: auto;ransition: transform .4s ease;ursor: pointer;"

        let items = []
        let htmls = '<div class="cards">'
        for (let i in list) {
            items.push(parseInt(i) + 1)
            htmls += `<label class="card_" id="item-${parseInt(i) + 1}" data-name="${list[i].name}" data-id="${list[i].id}" data-description="${list[i].description}"><img src="image/id/${list[i].image_id}" alt="${list[i].name}"></label>`
        }
        htmls += '</div>'

        // let cards = listImg.querySelector(elem)
        let cards = listImg

        cards.innerHTML = htmls
        let arrCards = []

        for (let i of items) {
            arrCards.push(cards.querySelector(`#item-${i}`))
        }

        for (let i in arrCards) {
            switch (i) {
                case '0':
                    arrCards[i].style = css[0]
                    break
                case '1':
                    arrCards[i].style = css[1]
                    document.querySelector('#description p').innerHTML = arrCards[i].attributes['data-description'].value
                    document.querySelector('.breed').innerHTML = arrCards[i].attributes['data-name'].value.toUpperCase()
                    document.querySelector('.breed').setAttribute('data-id', arrCards[i].attributes['data-id'].value)
                    break
                case '2':
                    arrCards[i].style = css[2]
                    break
                default:
                    arrCards[i].style = css[3]
            }
        }

        cards.addEventListener('click', () => {
            let arr = this.#direction(arrCards, true)
            arr[0].style = css[0]
            arr[1].style = css[1]
            arr[2].style = css[2]
            arr[3].style = css[3]
            arrCards = arr
            document.querySelector('#description p').innerHTML = arr[1].attributes['data-description'].value
            document.querySelector('.breed').innerHTML = arr[1].attributes['data-name'].value.toUpperCase()
            document.querySelector('.breed').setAttribute('data-id', arr[1].attributes['data-id'].value)
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

    #css() {
        return [
            'transform: translatex(-60%) scale(0); opacity: .3; z-index: 0;',
            'transform: translatex(0) scale(1);opacity: 1;z-index: 1;',
            'transform: translatex(60%) scale(.4);opacity: .3;z-index: 0;',
            'transform: translatex(60%) scale(.4);opacity: 0;z-index: 0;',
        ]
    }
}