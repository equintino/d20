<style>
    #imageAvatar {
        height: 350px;
        width: 250px;
        margin: auto;
        cursor: pointer;
    }

    #thumb_image {
        display: flex;
        justify-content: center;
        background: none;
        overflow-x: auto;
    }

    #form_avatar > div {
        display: flex;
        color: white;
    }

    #breed_description {
        text-transform: none;
        position: absolute;
    }
</style>
<div class="mt-4">
<?php if($act === "list"): ?>
    <div style="float: left">
        <section>
            <label class="label-rpg">Classe:</lebel>
            <select name="class" class="input-rpg" >
                <?php foreach($categories as $category): ?>
                <option value="<?= $category->id ?>" <?= ($category->id === $category_id ? "selected" : null) ?>><?= $category->name ?></option>
                <?php ($category->id === $category_id ? $description = $category->description : null) ?>
                <?php endforeach ?>
            </select>
        </section>
        <section>
            <div id="breed_description">
            <label class="label-rpg">Características:</lebel><br>
            <textarea class="input-rpg" disabled rows="10" ><?= $description ?></textarea>
            </div>
        </section>
    </div>
    <section class="wrapper">
        <div id="imageAvatar">
            <?php foreach($list as $avatar): ?>
            <img id="<?= $avatar["id"] ?>" src="image/id/<?= $avatar["image_id"] ?>" alt="" height="350px"/>
            <?php endforeach; ?>
        </div>
    </section>
<?php else: ?>
    <form id="form_avatar" method="POST" action="avatar/save" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?= $avatar->id ?>" />
        <div>
            <section class="side-left">
                <div>
                    <label>Raça:</label>
                    <select class="input-rpg" name="breed_id" >
                        <option value=""></option>
                        <?php foreach($breeds as $breed): ?>
                        <option value="<?= $breed->id ?>" <?= ($breed->id === $avatar->breed_id ? "selected" : null) ?>><?= $breed->name ?></option>
                        <?php endforeach ?>
                    </select>
                    <label>Classe:</label>
                    <select class="input-rpg" name="category_id" >
                        <option value=""></option>
                        <?php foreach($categories as $category): ?>
                        <option value="<?= $category->id ?>" <?= ($category->id === $avatar->category_id ? "selected" : null) ?>><?= $category->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div style="display: flex">
                    <label class="mr-2">Gênero:</label>
                    <input class="input-rpg" type="radio" name="sex" value="M" <?= ($avatar->sex === "M" ? "checked" : null) ?> />
                    <label class="mr-2">Maculino</label>
                    <input class="input-rpg" type="radio" name="sex" value="F" <?= ($avatar->sex === "F" ? "checked" : null) ?> />
                    <label>Feminino</label>
                </div>
                <div>&nbsp&nbsp&nbsp</div>
                <div>
                    <label>Descrição:</label>
                    <textarea class="input-rpg" rows="5" cols="48" type="text" name="description" style="text-transform: none"><?= $avatar->description ?></textarea>
                </div>
            </section>
            <section class="side-right" >
                <div id="thumb_image" >
                    <img src="image/id/<?= $avatar->image_id ?>" alt="" height="300px"/>
                </div>
                <div>
                    <label>Imagem:</label>
                    <input id="image" class="input-rpg" type="file" name="image" />
                </div>
            </section>
        </div>
    </form>
<?php endif ?>
</div>
<script>
    if(typeof(image) !== "undefined") {
        image.onchange = () => {
            let img = thumbImage(image, thumb_image)
            $(thumb_image).find("img").remove()
            $(thumb_image).append(img)
        }
    }
    if(act === "list") {
        $("#imageAvatar").slick({
            infinite: true,
            fade: true,
            dots: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
            variableWidth: false,
            adaptiveHeight: false,
            autoplay: false,
            cssEase: "linear"
        });
        $("[name=class]").on("change", function() {
            loading.show()
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
                    $(boxe_main).find("#content").load("avatar/show", { response }, function() {
                        loading.hide()
                    })
                },
                error: function(error) {
                },
                complete: function() {
                }
            })
        })
        if(typeof(character) !== "undefined") {
            $(imageAvatar).find("img").on("click", function() {
                let src = $("[aria-hidden=false]").attr("src")
                let image_id = src.split("/").pop()
                $(avatar).find("div").remove()
                $(avatar).append(
                    "<img src='" + src + "' alt='' /><input type='hidden' name='image_id' value='" + image_id + "' />"
                )
                let category = modal.content.find("[name=class] :selected").text().toUpperCase()
                let category_id = modal.content.find("[name=class] :selected").val()
                $(myClass).closest("div").append("<input type='hidden' name='category_id' value='" + category_id + "' />")
                $(myClass).parent().text(category)
                modal.close()
            })
        }
    }
</script>
