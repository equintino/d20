export default class ThumbImage {
    #img

    constructor({ origin, destination }) {
        this.#thumbImage({ origin, destination })
    }

    #thumbImage({ origin, destination }) {
        const _origin = document.querySelector(origin)
        const _destination = document.querySelector(destination)
        const [file] = _origin.files
        let imgs = ""
        let links = []
        for (const element of _origin.files) {
            imgs += "<img src='" + URL.createObjectURL(element) + "' alt='' />"
            links.push(URL.createObjectURL(element))
        }
        if (file) {
            _destination.src = URL.createObjectURL(file)
        }
        this.#img = _destination

        return this
    }

    setImg({ height, width }) {
        this.#img.style.height = height,
        this.#img.style.width = width
    }
}