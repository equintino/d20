import AbstractViews from './abstractviews.js'

export default class User extends AbstractViews {
    constructor() {
        super()
    }

    getUserEdition(elem, fn) {
        const _tab  = elem.querySelector('#tabList')
        const _rows = _tab.tBodies[0].rows
        for (let row of _rows) {
            let action
            let id
            let login
            let userEdition = row.querySelectorAll('[data-action]')
            userEdition.forEach((i) => {
                i.addEventListener('click', (e) => {
                    const _user = (e.target.attributes['data-action'] ? e.target.attributes : e.target.parentElement.attributes)
                    const formData = new FormData()
                    action = _user['data-action'].value
                    id = _user['data-id'].value
                    login = _user['data'].value
                    formData.append('id', id)
                    formData. append('login', login)
                    fn({ action, formData })
                })
            })
        }
    }
}