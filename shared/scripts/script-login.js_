let scriptLogin = () => {
    let registerUser = (modal) => {
        $("#content").on("submit" , function() {
            let form = $(this).find(loginRegister)[0];
            let formData = new FormData(form);
            if(saveData("user/save", formData)) {
                modal.close()
            }
        });
    }
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
