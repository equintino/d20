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
</style>
<div id="character" >
    <?php if(empty($act)): ?>
        <div id="init">
            <button class="btn btn-oval">Novo</button>
            <button class="btn btn-oval">Lista</button>
        </div>
    <?php elseif($act=='add'): ?>
        <div class='add'>
            <fieldset class="fieldset">
                <legend>CADASTRO DE PERSONAGEM</legend>
                <form enctype="multipart/form-data" id="myCharacter" action="../paginas/add.php?act=cad&personagem=<?= ($personagem ?? null) ?>&raca=<?= ($raca ?? null) ?>" method="POST">
                    <section class="side-left">
                        <label>Jogador: </label>
                        <input class="input-rpg" name="player" value="<?= ( strtoupper($login) ?? null) ?>" disabled />
                        <label>Personagem: </label>
                        <input class="input-rpg" type="text" name="character" required>
                        <div style="flex-grow: 2">
                            <!--<label>Raça: </label>-->
                            <button id="myBreed" class="btn-rpg" >Raça</button>
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
            <div class='btn_'>
                <input type="reset" value="LIMPA" class='btn-rpg btn-silver'>
                <input name="upload" type="submit" value="GRAVA" class='btn-rpg btn-green'>
            </div>
        </div>
    <?php endif ?>
</div>

<!-- <script type="text/javascript" src="<?= theme("assets/scripts.js") ?>" ></script> -->
<script>
$(function() {
    (slickScript = () => {
        $('.single-item').slick({
            fade: true,
            // dots: true,
            // infinite: true,
            // speed: 300,
            // slidesToShow: 1,
            // slidesToScroll: 1,
            // centerMode: true,
            // autoplay: true,
            // variableWidth: true,
            // adptiveHeight: true
        });
        $(".single-item").on("click keydown", function() {
            let breed = $(".single-item img[aria-hidden=false]").attr("alt")
            let detail = $(".single-item img[aria-hidden=false]").attr("data-description")
            $("#breed, .breed").text(breed.toUpperCase())
            $("[name=class]").val("")
            $(description).find("p").text(detail)
        })
    })()
        character.onclick = (i) => {
            loading.show()
            let btnName = i.target.innerText
            if(btnName === "Raça") {
                $(".galery > div").css("display", "block")
                $(".slick-next").trigger("click")
            }
            loading.hide()
        }
        character.onsubmit = (e) => {
            e.preventDefault()
        }
        $(character).find("[type=submit]").on("click", (e) => {
            alert("submeteu")
        })
        $(character).find("[type=reset]").on("click", () => {
            $(character).attr("value", "")
            let form = document.getElementById("myCharacter")
            for(let i = 0; i < form.length; i++) {
                if(i !== 0) {
                    form[i].value = ""
                }
            }
        })
        $(character).find("select[name=class]").on("change", function() {
            let breed_id = $(myCharacter).find(".single-item img[aria-hidden=false]").attr("data-id")
            let category_id = $(this).val()
            $.ajax({
                url: "breed",
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
                        title: "Escolha seu Personagem",
                        content: "breed/show",
                        params: { response }
                    });
                },
                error: function(error) {

                },
                complete: function() {

                }
            })
        })
    })
</script>
