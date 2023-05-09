const utils = {
    capitalize: (str) => {
        let newWords = ''
        let words = str.split(' ')
        for (let i of words) {
            let first = i[0].toUpperCase()
            newWords += first + i.substr(1)
        }
        return newWords
    },
    loading: {
        source: "themes/template/assets/img/loading.png",
        height: "100%",
        width: "100%",
        // mask: document.querySelector('#mask_main'),
        show: () => {
            document.querySelector('.loading img').src = utils.loading.source
            document.querySelector('.loading').style = 'display: fixed'
            // utils.loading.mask.style = 'display: block'
        },
        hide: () => {
            setTimeout(() => {
                document.querySelector('.loading').style = 'display: none'
                // utils.loading.mask.style = 'display: none'
            }, 200)
        }
    }
}

export default utils
