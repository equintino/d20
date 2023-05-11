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
        source: "themes/template/assets/img/loading2.png",
        height: "100%",
        width: "100%",
        show: () => {
            document.querySelector('.loading img').src = utils.loading.source
            document.querySelector('.loading').style = 'display: fixed'
        },
        hide: () => {
            setTimeout(() => {
                document.querySelector('.loading').style = 'display: none'
            }, 200)
        }
    }
}

export default utils
