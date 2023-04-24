function scriptUser() {
    const showExhibition = (element) => {
        if (typeof(user) !== 'undefined') {
            $(element).on("click", (e) => {
                loading.show()
                let action = e.delegateTarget.attributes["data-action"].value
                let tr = e.delegateTarget.parentElement
                let login = e.delegateTarget.attributes["data"].value
                if (action === "edit") {
                    user.querySelector(".header button.active").classList.remove("active")
                    $("#exhibition").load("user/login/" + login, () => {
                        loading.hide()
                    })
                    .on("submit", (e) => {
                        e.preventDefault()
                        let formData = new FormData(e.target)
                        if (saveData("user/update", formData)) {
                            user.querySelector(".header button[value=list]").click()
                        }
                    })
                } else if (action === "delete") {
                    if (logged.toLowerCase() === login.toLowerCase()) {
                        alertLatch("User logged in, is not allowed to delete it", "var(--cor-warning)");
                        $(".loading").hide();
                        return null;
                    }
                    modal.confirm({
                        title: "Você deseja realmente excluir o usuário <span style='margin-left: 5px;font-size: 1.2em'><strong style='color:red; margin-right: 5px'>" + login + "</strong>?</span>",
                        message: " "
                    })
                    .on("click", (e) => {
                        if (e.target.value == 1) {
                            let formData = new FormData()
                            if (saveData("user/delete/" + login, formData, "Excluindi...")) {
                                modal.hideContent()
                                tr.remove()
                            }
                        }
                    });
                } else if (action === "reset") {
                    modal.confirm({
                        title: "A senha será excluída",
                        message: "A nova senha será cadastrada no próximo login"
                    })
                    .on("click", (e) => {
                        if (e.target.value == 1) {
                            const formData = new FormData()
                            formData.append("login", login)
                            if (saveData("user/reset", formData)) {
                                modal.hideContent()
                            }
                        }
                    })
                }
                loading.hide()
            });
        }
    }

    const disabledTableLine = (dom) => {
        /** highlighting disabled user */
        $(dom).each(function() {
            let that = $(this)
            let disabledItens = $(this).find("td:eq(4)").text();
            if (disabledItens !== "SIM") {
                that.find("td").each(function() {
                    if ($(this).index() > 0 && $(this).index() < 5) {
                        let text = $(this).text()
                        $(this)
                            .html("<strike>" + text + "</sctrike>")
                            .css("color","var(--cor-secondary-light)");
                    }
                })
            }
        })
    }

    if (typeof(user) !== 'undefined') {
        user.querySelectorAll(".header button").forEach((e) => (
            e.addEventListener("click", () => {
                loading.show()
                let btnActive = user.querySelector(".header button.active")
                if (btnActive !== null) {
                    user.querySelector(".header button.active").classList.remove("active")
                }
                e.classList.add("active")
                let btnName = e.value
                if (btnName === "add") {
                    $("#exhibition").load("user/register", () => {
                            loginRegister.querySelector("input[name=name]").focus()
                            loading.hide()
                        })
                        .on("submit", (e) => {
                            e.preventDefault()
                            const formData = new FormData(loginRegister)
                            if (saveData("user/save", formData)) {
                                loginRegister.reset()
                            }
                        })
                        .show()
                } else {
                    $("#exhibition").load("user/list", () => {
                        showExhibition("#exhibition table#tabList tbody td")
                        disabledTableLine("#exhibition table tbody tr")
                        loading.hide()
                    })
                    .show()
                }
            })
        ))

        let btnList = user.querySelector(".header button[value=list]")
        btnList.click()
        btnList.focus()
    }
}
