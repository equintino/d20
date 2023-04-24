export default class Modal {
    #id
    #box
    #mask

    constructor(id){
        this.#id = id
    }

    openModal(boxe, page, fn) {
        this.#box = document.querySelector(boxe)
        this.#mask = document.querySelector('#mask_main')

        this.#box.innerHTML = page
        this.#box.style = 'display: flex'
        this.#mask.style = 'display: block'

        document.querySelector('#mask_main').addEventListener('click', () => {
            this.#box.style = 'display: none'
            this.#mask.style = 'display: none'
        })

        this.#box.querySelector('form').addEventListener('submit', (e) => {
            e.preventDefault()
            fn(e)
        })

        document.addEventListener('keyup', (e) => {
            if (e.key === 'Escape') { this.close() }
        })
    }

    close() {
        this.#box.style = 'display: none'
        this.#mask.style = 'display: none'
    }

    getBox() {
        return this.#box
    }
}