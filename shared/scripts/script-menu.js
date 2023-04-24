var identif = (page, logged) => {
    switch(page) {
        case "home":
            return "<i>Usuário:</i> " + logged;
        case "user":
            return "GERENCIAMENTO DE USUÁRIOS";
        case "character":
            return "GERENCIAMENTO DE PERSONAGENS";
        case "breed":
            return "GERENCIAMENTO DE RAÇAS";
        case "category":
            return "GERENCIAMENTO DE CLASSES";
        case "avatar":
            return "GERENCIAMENTO DE AVATARES";
        case "mission": case "mission/init":
            return "GERENCIAMENTO DE MISSÕES";
        case "player":
            return "GERENCIAMENTO DE JOGADORES";
        case "shield":
            return "GERENCIAMENTO DE ACESSOS";
        default:
            return null;
    }
}

var callScript = (name) => {
    switch(name) {
        case "user":
            scriptUser()
            break
        case "character":
            scriptCharacter()
            break
        case "breed/add":
            scriptBreed()
            break
        case "category":
            scriptCategory()
            break
        case "mission/init":
            scriptMission(init)
            break
        case "player":
            scriptPlayer()
            break
        case "avatar":
            scriptAvatar()
            break
        case "shield":
            scriptShield()
            break
        default:
    }
}

$(function() {
    $(document).on("click", function() {
        $(this).find(".dropdown-menu").css("display","none")
    })
    $(".dropdown-toggle").on("mouseover", function() {
        $(".dropdown-toggle").parent().find(".dropdown-menu").css("display","none")
        let dropdownMenu = $(this).parent().find(".dropdown-menu")
        dropdownMenu.css("display","block").on("mouseleave", function() {
            $(this).parent().find(".dropdown-menu").css("display","none")
        })
    })
    $("#topHeader ul li a").on("click", function(e) {
        e.preventDefault()
        var logged = (logged || null)
        let link = $(this).attr("href")
        let page = ($(this).attr("data-page") ?? '')
        let li = $(this).closest("li")

        $("#topHeader ul li").removeClass("active")
        li.addClass("active")
        if($(this).attr("data-toggle") !== "dropdown") {
            $("#upArrow").css("display","none")
            $(".loading, #mask_main").show()
            $(".identification").html(identif(page, logged))

            $(".content").load(link, function() {
                callScript(page)
                $(".loading, #mask_main").hide()
            })
        }
    })
    // $("#topHeader ul li [data-page=home]").trigger("click")
})
