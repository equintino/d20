export default class AbstractControllers {
    view
    service

    constructor({ view, service }) {
        this.view = view
        this.service = service
    }
}