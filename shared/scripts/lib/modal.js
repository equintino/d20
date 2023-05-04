export default class Modal {
    id
    #box
    #mask

    constructor(id){
        this.id = id
    }

    openModal(boxe, page, fn) {
        this.#box = document.querySelector(boxe)
        const close = this.#box.querySelector('#close')
        this.#mask = document.querySelector('#mask_main')

        this.#box.querySelector('#content').innerHTML = page
        this.#box.style = 'display: flex'
        this.#mask.style = 'display: block'

        if (this.#box.querySelector('form') !== null) {
            this.#box.querySelector('form').onsubmit = (e) => {
                e.preventDefault()
                fn(e)
            }
        }

        /** Closing */
        const hidden = [
            document.querySelector('#mask_main'),
            close
        ]
        for (let i of hidden) {
            i.onclick = () => {
                this.close()
            }
        }

        document.onkeyup = (e) => {
            if (e.key === 'Escape') { this.close() }
        }
    }

    buttons(buttons, fn) {
        const btn = this.#box.querySelector('#buttons')
        btn.innerHTML = buttons
        btn.onclick = (e) => {
            let form = this.#box.querySelector('form')
            if (e.target.value === 'reset') {
                form.reset()
            }
            if (typeof(fn) === 'function') fn(e, form)
        }
    }

    close() {
        let button = this.#box.querySelector('button')
        if (button !== null) button.remove()
        this.#box.style = 'display: none'
        this.#mask.style = 'display: none'
    }

    getBox() {
        return this.#box
    }
}