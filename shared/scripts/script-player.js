var scriptPlayer = () => {
    if (typeof(palyer) !== 'undefined') {
        $(player.querySelectorAll(".fa-times")).on("click", (e) => {
            loading.show()
            let playerId = e.target.parentElement.attributes["data-id"].value
            let character = e.target.parentElement.parentElement.querySelector("[data-character]").innerText
            modal.confirm({
                title: "Deseja realmente excluir este personagem?",
                message: character.toUpperCase()
            })
            .on("click", (e) => {
                if (e.target.value == 1) {
                    if (saveAjax("player/delete", { id: playerId }, "Excluindo...")) {
                        $(".content").load("player", () => {
                        })
                    }
                }
                mask_main.style = "diaplay=none"
            })
            loading.hide()
        })
    }
}
