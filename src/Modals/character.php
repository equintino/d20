<style>
    #edit_character .side-right {
        position: absolute;
        right: 10;
        top: 40;
    }
</style>
<?php if(empty($act)): ?>
<form id="form_story" action="#" method="POST">
    <label class="label-rpg">Uma breve história</label>
    <textarea rows="10" cols="80" name="story" class="input-rpg" ></textarea>
</form>
<?php elseif($act === "edit"): ?>
<div id='edit_character'>
    <form enctype="multipart/form-data" id="myCharacter" action="avatar/save" method="POST">
        <section class="side-left">
            <label class="label-rpg">Jogador: </label>
            <input class="input-rpg" name="name" value="<?= ( strtoupper($login) ?? null) ?>" disabled />
            <input type="hidden" name="name" value="<?= ( strtoupper($login) ?? null) ?>" />
            <input type="hidden" name="id" value="<?= $character->id ?>" />
            <label class="label-rpg">Personagem: </label>
            <input class="input-rpg" type="text" name="personage" value="<?= ($character->personage ?? null) ?>" data-id="<?= $character->id ?>" required <?= ($mission ? "disabled" : null) ?>>
            <div style="flex-grow: 2">
                <label class="label-rpg">Raça:</label>
                <select name="breed_id" class="input-rpg" <?= ($mission ? "disabled" : null) ?>>
                    <?php foreach($breeds as $breed): ?>
                    <option value="<?= $breed->id ?>" <?= ($character->breed_id === $breed->id ? "selected" : null) ?>><?= $breed->name ?></option>
                    <?php endforeach ?>
                </select>
                <label class="label-rpg">Classe: </label>
                <select name="category_id" class="input-rpg" <?= ($mission ? "disabled" : null) ?>>
                    <?php foreach($categories as $category): ?>
                    <option value="<?= $category->id ?>" <?= ($character->category_id === $category->id ? "selected" : null) ?>><?= $category->name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label class="label-rpg">Tendência 1: </label>
                <select name="trend1" class="input-rpg" <?= ($mission ? "disabled" : null) ?>>
                    <?php foreach($trends1 as $key => $trend1 ): ?>
                    <option value="<?= $key ?>" <?= ($character->trend1 === $key ? "selected" : null) ?>><?= $trend1 ?></option>
                    <?php endforeach ?>
                </select>
                <label class="label-rpg">Tendência 2: </label>
                <select name="trend2" class="input-rpg" <?= ($mission ? "disabled" : null) ?>>
                    <?php foreach($trends2 as $key => $trend2 ): ?>
                    <option value="<?= $key ?>" <?= ($character->trend2 === $key ? "selected" : null) ?>><?= $trend2 ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label class="label-rpg">Uma Breve História</label>
                <textarea class="input-rpg" rows="10" cols="60" name="story" <?= ($mission ? "disabled" : null) ?>><?= $character->story ?></textarea>
            </div>
        </section>
        <section id="avatar" class="side-right" >
            <input name="image_id" type="hidden" value="<?= $character->image_id ?>" />
            <img data-image_id="<?= $character->image_id ?>" src="image/id/<?= $character->image_id ?>" alt="" height="300px"/>
            <p class="label-rpg"><?= ($mission ? "Em Missão: <strong><i style='font-size: 1.1em'>{$mission->name}</i></strong>" : null) ?></p>
        </section>
    </form>
</div>
<?php endif ?>
<script>
    let openModalChange = (breed_id, category_id) => {
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
                modal.modal({
                    title: "Modo de edição de Personagem",
                    content: "avatar/show",
                    params: {
                        response,
                        act: "character"
                    },
                    buttons: "<button class='btn btn-rpg btn-danger' value='selected'>Selecionar</button>"
                }).on("click", function(e) {
                    if(e.target.value === "selected") {
                        image_id = imageAvatar.querySelector("img[aria-hidden=false]").src.split("/").pop()
                        avatar.querySelector("[name=image_id]").value = image_id
                        avatar.querySelector("img").src = "image/id/" + image_id
                        avatar.querySelector("img").attributes["data-image_id"].value = image_id
                        modal.hideContent()
                    }
                })
            },
            error: function(error) {
            },
            complete: function() {
            }
        })
    }
    $(function() {
        if(typeof(edit_character) !== "undefined") {
            edit_character.querySelector("[name=breed_id").onchange = (e) => {
                let breed_id = e.target.value
                let category_id = edit_character.querySelector("[name=category_id]").value
                avatar.querySelector("img").src = ""
                avatar.querySelector("img").attributes["data-image_id"].value = ""
                openModalChange(breed_id, category_id)
            }
            edit_character.querySelector("[name=category_id").onchange = (e) => {
                let category_id = e.target.value
                let breed_id = edit_character.querySelector("[name=breed_id]").value
                avatar.querySelector("img").src = ""
                avatar.querySelector("img").attributes["data-image_id"].value = ""
                openModalChange(breed_id, category_id)
            }
        }
    })
</script>
