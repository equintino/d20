import ReadFile from '../../lib/readFile.js'
import Services from './services.js'

export default class AbstractServices {
    readFile

    constructor() {
        this.readFile = new ReadFile()
    }

    open(method, page, data) {
        return Services.open(method, page, data)
    }
}