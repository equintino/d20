<style>
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
    <form id="form_avatar" method="POST" action="avatar/save" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?= ($avatar->id ?? null) ?>" />
        <div>
            <section class="side-left">
                <div>
                    <label>Raça:</label>
                    <select class="input-rpg" name="breed_id" >
                        <option value=""></option>
                        <?php foreach($breeds as $breed): ?>
                        <option value="<?= $breed->id ?>" <?= ($breed->id === $avatar->breed_id
                        ? "selected" : null) ?>><?= $breed->name ?></option>
                        <?php endforeach ?>
                    </select>
                    <label>Classe:</label>
                    <select class="input-rpg" name="category_id" >
                        <option value=""></option>
                        <?php foreach($categories as $category): ?>
                        <option value="<?= $category->id ?>" <?= ($category->id === $avatar->category_id
                        ? "selected" : null) ?>><?= $category->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div style="display: flex">
                    <label class="mr-2">Gênero:</label>
                    <input class="input-rpg" type="radio" name="sex" value="M" <?= (!empty($avatar)
                    && $avatar->sex === "M" ? "checked" : null) ?> />
                    <label class="mr-2">Maculino</label>
                    <input class="input-rpg" type="radio" name="sex" value="F" <?= (!empty($avatar)
                    && $avatar->sex === "F" ? "checked" : null) ?> />
                    <label>Feminino</label>
                </div>
                <div>&nbsp&nbsp&nbsp</div>
                <div>
                    <label>Descrição:</label>
                    <textarea class="input-rpg" rows="5" cols="40" type="text" name="description"
                    style="text-transform: none"><?= ($avatar->description ?? null) ?></textarea>
                </div>
            </section>
            <section class="side-right" >
                <img id="thumb_image" src="image/id/<?= ($avatar->image_id ?? null) ?>" alt="" height="300px"/>
                <div>
                    <label>Imagem:</label>
                    <input id="image" class="input-rpg" type="file" name="image" />
                </div>
            </section>
        </div>
    </form>
</div>
