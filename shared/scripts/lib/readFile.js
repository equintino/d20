export default class ReadFile {
    content
    status
    #xmlhttp

    constructor() {
        this.#xmlhttp = new XMLHttpRequest()
    }

    open({ method, url, async, formData }) {
        this.#xmlhttp.onreadystatechange = () => {
            this.content = this.#xmlhttp.responseText
            this.status = this.#xmlhttp.status
            return this.content
        }
        this.#xmlhttp.open(method, url, async)
        this.#xmlhttp.send(formData)
    }
}