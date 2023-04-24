import utils from "../../lib/utils.js"
import Views from "./views.js"

export default class AbstractViews {
    loading
    buttons

    constructor() {
        this.loading = utils.loading
        this.buttons = document.querySelectorAll('#init button')
    }

    showPage(page, fn) {
        Views.showPage(page, fn)
    }

    setButtons(fn) {
        this.buttons.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                this.loading.show()
                fn(e.target.value)
            })
        })
    }

    backInit(elem, fn) {
        elem.querySelectorAll('#init button').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                fn(e.target.value)
            })
        })
    }

    reset(form) {
        document.querySelector(form).reset()
    }

    submit(form) {
        let formData = new FormData(
            document.querySelector(form)
        )
        console.log(
            formData
        )
    }
}