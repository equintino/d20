export default class Modal {
    id
    #box

    constructor(id){
        this.id = id
    }

    openModal(box, page, fn, title, message) {
        let wProperty = {
            box: '#boxe_main',
            close: '#close',
            title: '#title',
            message: '#message',
            mask: '#mask_main',
            content: '#content'
        }
        if (box === '#boxe2_main') {
            wProperty = {
                box: '#boxe2_main',
                close: '#close2',
                title: '#title2',
                message: '#message2',
                mask: '#mask2_main',
                content: '#content2'
            }
        }

        const mask = document.querySelector(wProperty.mask)
        const _box = document.querySelector(wProperty.box)
        this.#box = _box
        const close = _box.querySelector(wProperty.close)
        const _title = _box.querySelector(wProperty.title)
        const _message = _box.querySelector(wProperty.message)
        const content = _box.querySelector(wProperty.content)

        content.innerHTML = (page ?? null)
        _title.innerHTML = (title ?? null)
        _message.innerHTML = (message ?? null)

        _box.style = 'display: flex'
        _title.style = 'display: block'
        if (typeof(message) !== 'undefined') _message.style = 'display: block'
        mask.style = 'display: block'

        if (_box.querySelector('form') !== null) {
            _box.querySelector('form').onsubmit = (e) => {
                e.preventDefault()
                fn(e)
            }
        }

        /** Closing */
        const hidden = [
            mask,
            close
        ]
        for (let i of hidden) {
            i.onclick = (e) => {
                this.close({ box: _box })
            }
        }

        document.onkeyup = (e) => {
            if (e.key === 'Escape') { this.close({ box: _box }) }
        }
    }

    buttons(buttons, fn, box) {
        const btn = (
            typeof(box) !== 'undefined' ?
                document.querySelector(`${box} #buttons2`) : this.#box.querySelector('#buttons')
        )
        btn.innerHTML = buttons
        btn.onclick = (e) => {
            let form = e.target.parentElement.parentElement.querySelector('form')
            let btnName = e.target.value
            if (btnName === 'reset') {
                form.reset()
            }
            if (btnName === 'no') {
                this.close({
                    box: e.target.parentElement.parentElement
                })
            }
            if (typeof(fn) === 'function') fn({ e, form })
        }
    }

    close({ box, all }) {
        if (typeof(all) !== 'undefined') {
            document.querySelector('#boxe_main').style.display = 'none'
            document.querySelector('#boxe2_main').style.display = 'none'
            return
        }
        let _box = (box ?? document.querySelector('#boxe_main'))
        let button = _box.querySelector('button')
        if (button !== null) button.remove()
        _box.style = 'display: none'
    }

    getBox() {
        return this.#box
    }
}