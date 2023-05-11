import ReadFile from '../../lib/readFile.js'
import Services from './services.js'
import Cookie from './../../lib/cookie.js'

export default class AbstractServices {
    readFile

    constructor() {
        this.readFile = new ReadFile()
    }

    open(method, page, data) {
        return Services.open(method, page, data)
    }

    setCookie(data) {
        for (let i of data) {
            Cookie.setCookie(i[0], i[1])
        }
    }

    getCookie(name) {
        Cookie.getCookie(name)
    }

    save({ page, formData }) {
        this.readFile.open('POST', page, false, formData)
        return this.readFile.content
    }

    update(page, data) {
        data.append('act', 'update')
        this.readFile.open('POST', page, false, data)
        return this.readFile.content
    }
}