const identif = (page, logged="Nenhum usuário logado") => {
    switch(page) {
        case "home":
            return "<i>Usuário:</i> " + logged;
        case "character":
            return "GERENCIAMENTO DE PERSONAGENS";
        case "breed":
            return "GERENCIAMENTO DE RAÇAS";
        case "category":
            return "GERENCIAMENTO DE CLASSES";
        case "avatar":
            return "GERENCIAMENTO DE AVATARES";
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
        }
    });
    $("#topHeader ul li [data-page=home]").trigger("click");
});
