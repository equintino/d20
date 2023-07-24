export default class Cookie {
    static setCookie(name, value, options = {}) {
        let updateCookie = `${encodeURIComponent(name)}=${encodeURIComponent(value)}`
        for (let i in options) {
            updateCookie += `;${i}=${options[i]}`
        }
        document.cookie = updateCookie
    }

    static getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ))

        return (matches ? decodeURIComponent(matches[1]) : undefined)
    }

    static getAll() {
        let cookies = document.cookie.split(';')
        let obj = {}
        for (let i of cookies) {
            let name = i.slice(0, i.indexOf('=')).trim()
            let value = i.slice(i.indexOf('=')).substring(1)
            obj[name] =  value
        }
        return obj
    }

    static deleteCookie(name) {
        this.setCookie(name, '', {
            'max-age': -1
        })
    }
}