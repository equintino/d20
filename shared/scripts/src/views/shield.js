import AbstractViews from "./abstractviews.js"

export default class Shield extends AbstractViews {
    init(fn) {
        document.querySelectorAll('#shield button').forEach((e) => {
            e.onclick = (btn) => {
                fn({
                    e: btn,
                    btnName: btn.target.value
                })
            }
        })
    }

    getBtnActive() {
        return document.querySelector('#shield .group .active')
    }

    screenCheck(access) {
        const check = document.querySelectorAll('.screen i')
        this.#cleanCheck(check)
        check.forEach((e) => {
            const page = e.attributes['data-page'].value
            if (access.indexOf(page) !== -1) {
                e.classList.replace('fa-times', 'fa-check')
                e.style.color = 'green'
            }
            e.onclick = (i) => {
                let noCheck = i.target.classList.contains('fa-times')
                if (noCheck) {
                    i.target.classList.replace('fa-times', 'fa-check')
                    i.target.style.color = 'green'
                } else {
                    i.target.classList.replace('fa-check', 'fa-times')
                    i.target.style.color = 'red'
                }
            }
        })
    }

    getAllCheck() {
        const formData = new FormData()
        const checked = document.querySelectorAll('.screen i.fa-check')
        const pages = []
        checked.forEach((e) => {
            pages.push(e.attributes['data-page'].value)
        })
        formData.append('pages', pages)
        return formData
    }

    #cleanCheck(check) {
        check.forEach((e) => {
            e.classList.replace('fa-check', 'fa-times')
            e.style.color = 'red'
        })
    }
}