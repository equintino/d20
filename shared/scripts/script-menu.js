const identif = (page, logged="Nenhum usuário logado") => {
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
        case "mission":
            return "GERENCIAMENTO DE MISSÕES";
        case "player":
            return "GERENCIAMENTO DE JOGADORES";
        default:
            return null;
    }
}

const callScript = (name) => {
    switch(name) {
        case "user":
            scriptUser();
            break;
        case "character":
            scriptCharacter();
            break;
        case "breed/add":
            scriptBreed();
            break;
        case "category":
            scriptCategory();
            break;
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
        e.preventDefault();
        let link = $(this).attr("href");
        var page = ($(this).attr("data-page") ?? '');
        var li = $(this).closest("li");

        $("#topHeader ul li").removeClass("active");
        li.addClass("active");
        if($(this).attr("data-toggle") !== "dropdown") {
            $("#upArrow").css("display","none");
            $(".loading, #mask_main").show();
            $(".identification").html(identif(page, logged));

            $(".content").load(link, function() {
                callScript(page);
                $(".loading, #mask_main").hide();
            });
        } else {
            // $(this).parent().find(".dropdown-menu:hover").css("display","block")
            // $(this).parent().find(".dropdown-menu").addClass("show").css("display", "block")
            // $(this).parent().find(".dropdown-menu").css("display", "block")
            // console.log($(this).parent().find(".dropdown-menu").css("display", "block"))

        }
    });
    $("#topHeader ul li [data-page=home]").trigger("click");
});
