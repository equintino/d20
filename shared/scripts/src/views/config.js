import AbstractViews from './abstractviews.js'

export default class Config extends AbstractViews {
    clickScreen(fn) {
        document.querySelectorAll('#config span').forEach((e) => {
            e.onclick = (evt) => {
                const target = evt.target
                const connectionName = target.parentElement.parentElement.children[1].innerText
                const formData = new FormData()
                formData.append('connectionName', connectionName)
                fn({
                    act: target.attributes.action.value,
                    formData
                })
            }
        })
        document.querySelector('#config button').onclick = (e) => {
            fn({
                act: e.target.value
            })
        }
    }
}