var scriptAvatarList = () => {
    const act = {
        getAvatarList: (breedId, categoryId) => {
            let list
            $.ajax({
                url: "avatar",
                type: "POST",
                dataType: "JSON",
                data: {
                    breedId,
                    categoryId
                },
                async: false,
                beforeSend: () => {
                },
                success: (response) => {
                    if (typeof(response) === "string") {
                        return alertLatch(response, "var(--cor-warning)")
                    }
                    list = {
                        act: "list",
                        response,
                        breedId,
                        categoryId
                    }
                },
                error: function(error) {
                },
                complete: function() {
                }
            })
            return list
        },
        reload: (params) => {
            $("#content #avatarList").load("avatar/show", params, () => {
                let breedId = avatarList.querySelector("[name=breed]").value
                let categoryId = avatarList.querySelector("[name=class]").value
                act.avatarChange(breedId, categoryId)
                if (imageAvatar.classList.value.indexOf("slick") === -1) {
                    activeSlick(imageAvatar)
                }
                loading.hide()
            })
        },
        avatarShow: (breedId, categoryId) => {
            let params = act.getAvatarList(breedId, categoryId)
            act.reload(params)
        },
        avatarChange: (breedId, categoryId) => {
            avatarList.querySelector("[name=breed]").onchange = (e) => {
                loading.show()
                act.avatarShow(e.target.value, categoryId)
            }
            avatarList.querySelector("[name=class]").onchange = (e) => {
                loading.show()
                act.avatarShow(breedId, e.target.value)
            }
        }
    }
    activeSlick(imageAvatar)
    if (typeof(avatarList) !== "undefined" && avatarList.querySelector("[name=class]") !== null) {
        let breedId = avatarList.querySelector("[name=breed]").value
        let categoryId = avatarList.querySelector("[name=class]").value
        act.avatarChange(breedId, categoryId)
    }
}
