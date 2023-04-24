export default class Message {
    #box

    constructor() {
        this.#box = document.querySelector('#alert')
    }

    static alertLatch(text, background) {
        const message = new Message()
        message.#box.classList.add('flash')
        message.#box.style = `background: ${background}`
        message.#box.innerHTML = text

        setTimeout(() => {
            message.#box.innerText = ''
            message.#box.style = 'display: none'
            message.#box.classList.remove('flash')
        }, 9000)
    }
}