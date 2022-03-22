<style>
    #character {
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #init button {
        width: 180px;
        font-size: 1.5em;
    }

    .galery {
        width: 230px;
        float: right;
        text-align: center;
        margin-right: 15%;
    }

    .galery > div {
        display: none;
    }

    .galery img {
        height: 350px;
    }

    #description {
        height: 350px;
        width: 100%;
        margin-top: 40px;
        font-family: 'Libre Franklin', sans-serif;
        font-weight: bolder;
        letter-spacing: .1em;
        text-align: justify;
        padding: 80px 60px 0px 100px;
    }

    #description > p {
        overflow: auto;
        height: 160px;
        color: black;
        text-shadow: 1px 1px 1px black;
    }

    #list {
        display: flex;
        flex-direction: row;
        justify-content: center;
        width: 100%;
    }

    #list .left {
        width: 30%;
        text-align: center;
    }

    #list .left button {
        width: 130px;
    }

    #list .left .fieldset, #list .right .fieldset {
        height: 550px;
    }

    #list .left .fieldset {
        overflow: auto;
    }

    #list .right {
        width: 70%;
    }

    #list .right > .fieldset {
        display: flex;
        justify-content: space-between;
    }

    #list .breed_class {
        /* position: absolute; */
        /* right: 130px;
        top: 160px; */
        cursor: pointer;
        /* z-index: 1; */
    }

    /* #list .breed_class::before {
        display: flex;
    } */

    #list #story {
        width: 280px;
    }
</style>
<div id="character" >
    <?php if(empty($act)): ?>
        <div id="init">
            <button class="btn btn-oval" value="new">Novo</button>
            <button class="btn btn-oval" value="list">Lista</button>
        </div>
    <?php elseif($act=='add'): ?>
        <div class='add'>
            <fieldset class="fieldset" style="margin-top: 120px">
                <legend>CADASTRO DE PERSONAGEM</legend>
                <form enctype="multipart/form-data" id="myCharacter" action="avatar/save" method="POST">
                    <section class="side-left">
                        <label>Jogador: </label>
                        <input class="input-rpg" name="name" value="<?= ( strtoupper($login) ?? null) ?>" disabled />
                        <input type="hidden" name="name" value="<?= ( strtoupper($login) ?? null) ?>" />
                        <label>Personagem: </label>
                        <input class="input-rpg" type="text" name="personage" required>
                        <div style="flex-grow: 2">
                            <button id="myBreed" class="btn-rpg" value="breed">Raça</button>
                            <span class="breed">&nbsp</span>
                        </div>
                        <div style="flex-grow: 2">
                            <label>Classe: </label>
                            <span>
                                <select id="myClass" class="input-rpg" name="class" >
                                    <option></option>
                                    <?php foreach($classes as $class): ?>
                                    <option value="<?= $class->id ?>"><?= strtoupper($class->name) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </span>
                        </div>
                        <div>
                            <label>Tendência 1: </label>
                            <select id="tred1" class="input-rpg" name="trend1">
                                <option></option>
                                <option value="good">BOM</option>
                                <option value="neutral">NEUTRO</option>
                                <option value="bad">MAU</option>
                            </select>
                            <label>Tendência 2: </label>
                            <select id="tred2" class="input-rpg" name="trend2">
                                <option></option>
                                <option value="leal">LEAL</option>
                                <option value="neutral">NEUTRO</option>
                                <option value="chaotic">CAÓTICO</option>
                            </select>
                        </div>
                        <div id="description"  style="background: url('d20/<?= theme("assets/img/pergaminho.png") ?>'); background-repeat: round">
                            <p></p>
                        </div>
                        <script>var jogador='<?= $login ?>';</script>
                    </section>
                    <section id="avatar" class="galery .side-right" >
                        <div><span id="breed">&nbsp</span></div>
                        <div class="single-item">
                            <?php foreach($breeds as $breed): ?>
                            <img src="image/id/<?= $breed->image_id ?>" alt="<?= $breed->name ?>" data-description="<?= $breed->description ?>" data-id="<?= $breed->id ?>"/>
                            <?php endforeach ?>
                        </div>
                    </section>
                </form>
            </fieldset>
            <div style="float: left; margin-left: 40px">
                <button type="button" class="btn btn-rpg btn-silver" value="back">Voltar</button>
            </div>
            <div class='btn_'>
                <button type="reset" class='btn-rpg btn-silver' value="clear" >Limpar</button>
                <button type="submit" class='btn-rpg btn-green' value="save">Salvar</button>
            </div>
        </div>
    <?php elseif($act === "list"): ?>
        <div id="list" class="mt-5">
            <section>
                <button class="btn btn-rpg btn-info" value="back" style="margin-top: 115px">Voltar</button>
            </section>
            <section class="left">
                <fieldset class="fieldset">
                    <legend>Personagens</legend>
                    <?php foreach($characters as $character): ?>
                        <button class="btn btn-oval" data-id="<?= $character->id ?>" data-image_id="<?= $character->image_id ?>" data-breed_id="<?= $character->breed_id ?>" data-category_id="<?= $character->category_id ?>" data-story="<?= $character->story ?>" data-mission="<?= $character->mission_id ?>"><?= $character->personage ?></button>
                    <?php endforeach ?>
                </fieldset>
            </section>
            <section class="right">
                <fieldset class="fieldset">
                    <legend>Avatar</legend>
                    <div id="story">
                        Uma breve história
                        <p></p>
                    </div>
                    <div id="avatar" class="mt-4"></div>
                    <div class="breed_class">
                        <div id="detail_breed" style="text-align: center"></div>
                        <div id="detail_class" class="mt-2" style="text-align: center"></div>
                        <label class="label-rpg mt-4">Missão:</label>
                        <p style="text-align: center"></p>
                    </div>
                </fieldset>
            </section>
            <section>
                <button class="btn btn-rpg btn-danger" value="edit" style="margin-top: 115px">Editar</button>
            </section>
        </div>
    <?php endif ?>
</div>
<script>
$(function() {
    (slickScript = () => {
        $('.single-item').slick({
            fade: true,
            infinite: true,
            dots: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
            autoplay: false,
            variableWidth: false,
            adptiveHeight: false
        });
    })()
    character.onsubmit = (e) => {
        e.preventDefault()
    }

    /** Buttons */
    character.onclick = (i) => {
        loading.show()
        let btnName = i.target.value
        switch(btnName) {
            case "new": case "clear":
                $(".content").load("character/add", function() {
                    loading.hide()
                })
                break
            case "list":
                $(".content").load("character/list", function() {
                    loading.hide()
                })
                break
            case "breed":
                $(".galery > div").css("display", "block")
                $(".single-item").on("click keydown", function() {
                    let breed = $(".single-item img[aria-hidden=false]").attr("alt")
                    let breed_id = $(".single-item img[aria-hidden=false]").attr("data-id")
                    let detail = $(".single-item img[aria-hidden=false]").attr("data-description")
                    $(".breed").closest("div").append("<input type='hidden' name='breed_id' value='" + breed_id + "' />")
                    $("#breed, .breed").text(breed.toUpperCase())
                    $(description).find("p").text(detail)
                })
                $(".slick-next").trigger("click")
                loading.hide()
                break
            case "back":
                $(".content").load("character", function() {
                    loading.hide()
                })
                break
            case "save":
                let formData = new FormData(myCharacter)
                modal.show({
                    title: "Descreva a história do seu personagem",
                    content: "character/story",
                    buttons: "<button class='btn btn-rpg btn-silver' value='0'>Limpar</button><button class='btn btn-rpg btn-danger' value='1'>Salvar</button>"
                }).on("click", function(i) {
                    let story = modal.content.children().find("[name=story]").val()
                    if(i.target.value == "1") {
                        formData.append("story",story)
                    }
                    if(saveData("character/save", formData)) {
                        $(".content").load("character/add", function() {
                            loading.hide()
                        })
                        modal.hideContent()
                    }
                })
                loading.hide()
                break
            case "edit":
                let btnActive = $(list.querySelector(".left")).find("button.active")
                let id = btnActive.attr("data-id")
                let image_id = btnActive.attr("data-image_id")
                let breed_id = btnActive.attr("data-breed_id")
                let category_id = btnActive.attr("data-category_id")
                let story = btnActive.attr("data-story")
                params = {
                    id,
                    image_id,
                    breed_id,
                    category_id,
                    story
                }

                modal.show({
                    title: "Modo de edição de PERSONAGEM",
                    content: "character/edit",
                    params: params,
                    buttons: "<button class='btn btn-rpg btn-silver' value='0'>Excluir</button><button class='btn btn-rpg btn-danger' value='1'>Salvar</button>"
                }).on("click", function(i) {
                    if(i.target.value == "0") {
                        modal.confirm({
                            title: "Modo de Exclusão",
                            message: "Deseja realmente excluir este PERSONAGEM?"
                        }).on("click", function(i) {
                            if(i.target.value === "1") {
                                let id = modal.content.find("[data-id]").attr("data-id")
                                $.ajax({
                                    url: "character/delete",
                                    type: "POST",
                                    dataType: "JSON",
                                    data: {
                                        id
                                    },
                                    beforeSend: function() {
                                        loading.show()
                                    },
                                    success: function(response) {
                                        alertLatch("Personage removed successfully", "var(--cor-success)")
                                        modal.hideContent()
                                        $(".content").load("character/list", function() {
                                            loading.hide()
                                        })
                                    },
                                    error: function(error) {

                                    },
                                    complete: function() {
                                        loading.hide()
                                    }

                                })
                            }
                        })
                    } else {
                        let formData = new FormData(myCharacter)
                        if(saveData("character/update", formData)) {
                            $(".content").load("character/list", function() {
                                loading.hide()
                            })
                            modal.hideContent()
                        }
                    }
                })
                break
            default:
                loading.hide()

        }
    }

    /** Selection of the avatar */
    $(character).find("select[name=class]").on("change", function() {
        let breed_id = $(myCharacter).find(".single-item img[aria-hidden=false]").attr("data-id")
        let category_id = $(this).val()
        $.ajax({
            url: "avatar",
            type: "POST",
            dataType: "JSON",
            data: {
                breed_id,
                category_id
            },
            beforeSend: function() {
            },
            success: function(response) {
                if(typeof(response) === "string") {
                    return alertLatch(response, "var(--cor-warning)")
                }
                modal.show({
                    title: "Escolha seu Personagem (clique na imagem para selecioná-la)",
                    content: "avatar/show",
                    params: { response }
                })
            },
            error: function(error) {
            },
            complete: function() {
            }
        })
    })
    if(typeof(list) !== "undefined") {
        $(".left button").on("click", (i) => {
            let id = i.target.attributes["data-id"].value
            let image_id = i.target.attributes["data-image_id"].value
            let breed_id = i.target.attributes["data-breed_id"].value
            let category_id = i.target.attributes["data-category_id"].value
            let resume = i.target.attributes["data-story"].value
            let mission_id = i.target.attributes["data-mission"].value

            /** Loading Breed */
            $.ajax({
                url: "breed/id/" + breed_id,
                type: "POST",
                dataType: "JSON",
                data: {
                    id: breed_id
                },
                beforSend: function() {
                    loading.show()
                },
                success: function(response) {
                    detail_breed.innerHTML = "<img src='image/id/" + response.image_id + "' alt='' height='100px' title='" + response.name + "'/>"
                },
                error: function(error) {
                    console.log(error)
                },
                complete: function() {
                    loading.hide()
                }
            })

            /** Loading Class */
            $.ajax({
                url: "category/id/" + category_id,
                type: "POST",
                dataType: "JSON",
                data: {
                    id: category_id
                },
                beforSend: function() {
                    loading.show()
                },
                success: function(response) {
                    detail_class.innerHTML = "<img src='image/id/" + response.image_id + "' alt='' height='50px' title='" + response.name + "'/>"
                },
                error: function(error) {
                    console.log(error)
                },
                complete: function() {
                    loading.hide()
                }
            })

            if(mission_id !== "") {
                /** Loading Mission */
                list.querySelector(".breed_class p").innerHTML = "<img class='schedule' src='themes/template/assets/img/loading.png' alt='' height='30px' />"
                $.ajax({
                    url: "mission/id/" + mission_id,
                    type: "POST",
                    dataType: "JSON",
                    beforSend: function() {
                    },
                    success: function(response) {
                        list.querySelector(".breed_class p").innerHTML = "<textarea class='input-rpg' disabled >" + response.name + "</textarea>"
                    },
                    error: function(error) {
                    },
                    complete: function() {
                    }
                })
            } else {
                list.querySelector(".breed_class p").innerHTML = "Sem missão"
            }

            avatar.innerHTML = "<img data-id='" + id + "' src='image/id/" + image_id + "' alt='' height='400px'/>"
            story.children[0].innerHTML = "<textarea rows='20' class='input-rpg' disabled>" + resume + "</textarea>"
        })
    }

    /** Keep actived button */
    $(".btn-oval").on("click", function() {
        $(".btn-oval").removeClass("active")
        $(this).addClass("active")
    })
})
</script>
