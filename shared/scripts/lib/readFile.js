export default class ReadFile {
    content
    status
    #xmlhttp

    constructor() {
        this.#xmlhttp = new XMLHttpRequest()
    }

    open(method, url, async, data) {
        this.#xmlhttp.onreadystatechange = () => {
            this.content = this.#xmlhttp.responseText
            this.status = this.#xmlhttp.status
            return this.content
        }
        this.#xmlhttp.open(method, url, async)
        this.#xmlhttp.send(data)
    }

    // save( dataJson) {
    //     // localStorage.setItem('dataJason', JSON.stringify(dataJson))
    //     // let objSaved = localStorage.getItem('dataJson')

    //     // console.log(
    //     //     'objSaved:', JSON.parse(objSaved)
    //     // )


    //     // return console.log(
    //     //     fs
    //     // )
    //     // fs.readFile('data.json', 'utf-8', (err, dataJson) => {
    //     //     if (err) throw err
    //     //     let json = JSON.parse(dataJson)
    //     //     // ...
    //     // })
    //     // fs.writeFile('dataJson.json', JSON.stringify(json), 'utf-8', (err) => {
    //     //     if (err) throw err;
    //     //     console.log('The file has been saved!');
    //     // });
    // }
}