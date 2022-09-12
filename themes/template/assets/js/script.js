/** Constantes */
 const CONF_DATATABLE_ZERORECORDS = "Desculpe - Nada encontrado";
 const CONF_DATATABLE_INFOEMPTY =  "Nenhum dado disponível";
 const CONF_DATATABLE_SEARCH =  "Filtrar";
 const CONF_DATATABLE_PROCESSING = "<div class='progress'><div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='background: #003366' ></div></div><span class='fa-blink'>carregando...</span>";
 const CONF_DATATABLE_LOADING = "<div class='lendoDataTable lendo'><img src='../web/img/lendo.gif' alt='lendo' height='180' /></div>";
 const CONF_DATATABLE_INFOFILTERED =  "(filtrado _MAX_ linha(s))";
 const CONF_DATATABLE_INFO =  "Linhas de _START_ a _END_ do total de _TOTAL_ linhas";
 const CONF_DATATABLE_SLENGTHMENU = "Exibindo _MENU_ linhas por página";
 const CONF_DATATABLE_DECIMAL = ",";
 const CONF_DATATABLE_THOUSANDS = ".";

/** Datatable default */
$.extend( true, $.fn.dataTable.defaults, {
    searching: false,
    ordering: false,
    info: false,
    paging: false
});

/** variables */
var setTime = 500;

$(function($) {
    if(typeof(initializing) !== "undefined") {
        $("#boxe_main").load("config", function() {
            $("#boxe_main #config-form").append("<button class='button-style mt-3' style='margin-top: 10px' >Save</button>")
        })
        .on("submit", function(e) {
            e.preventDefault()
            var url = "src/Support/Ajax/save.php"
            var dataSet = $("#config-form").serializeArray();
            dataSet.push({
                name: "act",
                value: "config"
            });
            let msg = saveForm("connection","add", "null", url)
            if(msg) {
                window.location.reload()
            }
        })
        .css({
            top: "0",
            padding: "30px"
        })
        $("#boxe_main, #mask_main").show()
    }
    /** authentication */
    $("form.form-signin").on("submit", function(e) {
        e.preventDefault();
        $("button").html("<i class='fa fa-sync-alt schedule'></i>");
        var data = $("form.form-signin").serialize();
        var url = "src/public/main.php";
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "json",
            success: function(response) {
                if(response === 1) {
                    $(location).attr("href","");
                } else if(response === 2) {
                    var link = "src/Support/Ajax/save.php";
                    var login = $("form [name=login]").val();
                    var lkToken = "token";
                    $("#boxe_main, #mask_main").show();
                    $("#boxe_main").load(lkToken, function() {
                        $("#form-token").find("[name=password]").focus();
                    })
                    .on("submit", function(e) {
                        e.preventDefault();
                        var formData = new FormData($("form#form-token")[0]);
                        formData.append("act","login");
                        formData.append("action","change");
                        formData.append("login",login);
                        if(formData.get("password") !== formData.get("confPassword")) {
                            alertLatch("The passwords are different", "var(--cor-warning)");
                        } else if(formData.get("password") === "") {
                            alertLatch("Invalid blank password", "var(--cor-warning)");
                        } else {
                            if(saveData(link, formData, "Saving")) {
                                $("#boxe_main, #mask_main").hide();
                                $(location).attr("href","");
                            }
                        }
                    })
                    .css({
                        top: "20%",
                        "padding": "30px"
                    });
                } else {
                    alertLatch(response, "var(--cor-warning)");
                }
            },
            error: function(error) {
                alertLatch("Please recharge the page", "var(--cor-danger)");
            },
            complete: function(response) {
                $("button").text("Entrar");
            }
        })
    })
    add.onclick = (e) => {
        e.preventDefault()
        $("#boxe_main").load("register", () => {
            $("#boxe_main #edit label").css("text-align", "left")
        })
        .on("submit", () => {
            alert("submeteu")
        })
        $("#boxe_main, #mask_main").show();
        mask_main.onclick = () => {
            $("#boxe_main, #mask_main").hide()
        }
    }
    document.onkeyup = (e) => {
        if(e.keyCode === 27) {
            $("#boxe_main, #mask_main").hide()
        }
    }

    let registerUser = (modal) => {
        $("#content").on("submit" , function() {
            let form = $(this).find(loginRegister)[0];
            let formData = new FormData(form);
            if(saveData("user/save", formData)) {
                modal.close()
            }
        });
    }
    if(typeof(signinForm) !== "undefined") {
        signinForm.onsubmit = (e) => {
            e.preventDefault()
            let link = signinForm.action
            $.ajax({
                url: link,
                type: "POST",
                dataType: "JSON",
                data: $(signinForm).serialize(),
                beforeSend: function() {
                    $("button").html("<i class='fa fa-sync-alt schedule' style='padding: 5px'></i>");
                },
                success: function(response) {
                    if(response.indexOf("No data") !== -1) {
                        modal.show({
                            title: "Cadastro de Novo Usuário",
                            content: "user/register"
                        }).
                        complete({
                            callback: function() {
                                registerUser(modal);
                            }
                        });
                        return null;
                    }
                    if(response == 1) {
                        return window.location.assign("")
                    }
                    return alertLatch(response, "var(--cor-warning)");
                },
                error: function(error) {
                    console.log(error)
                },
                complete: function() {
                    $("button").text("Enter")
                }
            })
        }
    }
});
