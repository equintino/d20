import AbstractControllers from "./abstractcontrollers.js"
import Carousel from './../../lib/carousel.js'

export default class Character extends AbstractControllers {
    constructor(deps) {
        super(deps)
    }

    static initializer(deps) {
        const character = new Character(deps)
        character.#init()
    }

    #init() {
        this.view.setButtons((btnName) => {
            this.#optInit(btnName)
        })
    }

    #optInit(btnName) {
        if (btnName === 'new') {
            return this.view.showPage(this.service.open('GET', 'character/add'), (elem) => {
                this.#setButton(elem)
            })
        }

        if (btnName === 'list') {
            return this.view.showPage(this.service.open('GET', 'character/list'), (elem) => {
                this.#setButton(elem)
            })
        }
    }

    #setButton(elem) {
        elem.querySelectorAll('button').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.preventDefault()
                let btnName = e.target.value
                switch (btnName) {
                    case 'back':
                        this.view.showPage(this.service.open('GET', 'character'), (elem) => {
                            this.view.backInit(elem, (btnName) => {
                                this.#optInit(btnName)
                            })
                        })
                        break
                    case 'save':
                        this.view.submit('#character form')
                        break
                    case 'breed':
                        const list = JSON.parse(this.service.open('POST', 'breed/list'))
                        const carousel = new Carousel('#avatar', list)


                        // let details = () => {
                        //     // let breed = document.querySelector('.single-item img[aria-hidden=false]').attributes['alt']
                        //     // console.log(
                        //     //     breed
                        //     // )
                        //     // let breed = $(".single-item img[aria-hidden=false]").attr("alt")
                        //     // let breed_id = $(".single-item img[aria-hidden=false]").attr("data-id")
                        //     // let detail = $(".single-item img[aria-hidden=false]").attr("data-description")
                        //     // $(".breed").closest("div").append("<input type='hidden' name='breed_id' value='"
                        //     //     + breed_id + "' />")
                        //     // $("#breed, .breed").text(breed.toUpperCase())
                        //     // $(description).find("p").text(detail)
                        // }
                        // listAvatar.addEventListener("click", () => {
                        //     details()
                        // })
                        // listAvatar.addEventListener("keydown", () => {
                        //     details()
                        // })
                        // // $(".slick-next").trigger("click")
                        // details()
                        break
                    case 'clear':
                        this.view.reset('#character form')
                        break
                }
            })
        })
    }
}