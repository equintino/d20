import AbstractViews from './abstractviews.js'

export default class Mission extends AbstractViews {
    constructor() {
        super()
    }

    setDetailMission({ mission }) {
        let text = ''
        let imgs = ''

        for (const personage of mission.personages) {
            text += `<div><i class='fa fa-circle mr-2' style='font-size: .8em'></i>${personage}</div>`
        }

        for (const map of mission.maps) {
            imgs += `<img data-id='${map.image_id}' src='image/id/${map.image_id}' alt='' height='280px' />`
        }

        document.querySelector('#mission #story').innerHTML = mission.story
        document.querySelector('#mission #personage').innerHTML = text
        document.querySelector('#mission #images').innerHTML = imgs
        document.querySelector('#mission .middle p').innerText = `Total de Maps: ${mission.maps.length}`
    }

    getMapSelected({ elem }) {
        const maps = elem.querySelector('#mission #images #cards_')
        if (maps !== null && maps.children.length > 0) {
            for (let map of maps.children) {
                const formData = new FormData()
                let idMap
                let idImage
                if (maps.children.length === 1) {
                    idMap = map.attributes['data-id'].value
                    idImage = map.attributes['data-idImage'].value
                    formData.append('id', idMap)
                    formData.append('image_id', idImage)
                    return formData
                }
                if (map.style.zIndex == 1) {
                    idMap = map.attributes['data-id'].value
                    idImage = map.attributes['data-idImage'].value
                    formData.append('id', idMap)
                    formData.append('image_id', idImage)
                    return formData
                }
            }
        }
        return null
    }

    btnActiveSelected({ elem }) {
        return elem.querySelector('#mission #list .active')
    }
}