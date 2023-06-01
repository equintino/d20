import utils from './../../lib/utils.js'
import AbstractViews from './abstractviews.js'

const loading = utils.loading

export default class Menu extends AbstractViews {
    #top
    #identification

    constructor() {
        super()
        this.#top = document.querySelector('#top')
        this.#identification = document.querySelector('#identification')
        this.#top.style = 'display: flow-root list-item'
    }

    setIdentification(data) {
        this.#identification.innerHTML = data
    }

    setMenu(fn) {
        this.#top.addEventListener('click', (e) => {
            e.preventDefault()
            loading.show()
            this.#active(e)
            let page  = (
                e.target.tagName === 'I' ?
                    e.target.parentElement.attributes['href'].value.split('/').pop()
                    : e.target.attributes['href'].value.split('/').pop()
            )
            fn(page)
        })
        const dropdown = this.#top.querySelector('.dropdown')
        if (dropdown !== null) {
            dropdown.onmouseover = (e) => {
                this.#top.querySelector('.dropdown-menu').style = 'display: block'
                this.#identification.style = 'z-index: -1'
            }
            dropdown.parentElement.onmouseleave = () => {
                this.#top.querySelector('.dropdown-menu').style.display = 'none'
                this.#identification.style = 'z-index: 1'
            }
        }
    }

    reload() {
        window.location.reload()
    }

    #active(e) {
        let active = e.target.classList
        this.#top.querySelector('.active').classList.remove('active')
        active.add('active')
    }
}