<style>
    #avatarList #imageAvatar {
        position: relative;
        left: 90px;
        padding: 20px;
        height: 350px;
        width: 350px;
        margin: auto;
        top: 15%;
    }

    #avatarList #imageAvatar img {
        max-height: 300px
    }
</style>
<form id="avatarList" method="POST" action="#">
    <?php if (empty($source) || $source === "character"): ?>
    <div style="float: left">
        <section>
            <label class="label-rpg">Raça:</lebel>
            <select name="breed_id" class="input-rpg" >
                <?php foreach($breeds as $breed): ?>
                <option value="<?= $breed->id ?>" data-description="<?= $breed->description ?>"
                    <?= ($breed->id == $idBreed ? "selected"
                    : null) ?>><?= $breed->name ?>
                </option>
                <?php endforeach ?>
            </select>
        </section>
        <section>
            <label class="label-rpg">Classe:</lebel>
            <select name="category_id" class="input-rpg" >
                <?php foreach($categories as $category): ?>
                <option value="<?= $category->id ?>" <?= ($category->id == $idCategory ? "selected"
                    : null) ?>><?= $category->name ?></option>
                <?php endforeach ?>
            </select>
        </section>
        <section>
            <div id="breed_description">
            <label class="label-rpg">Características da Classe:</lebel><br>
            <textarea name="description" class="input-rpg" disabled rows="10" ><?= ($currentCat->description
                ?? "Sem descrição") ?></textarea>
            </div>
        </section>
    </div>
    <?php endif ?>
    <section class="wrapper">
        <div id="imageAvatar" class="mt-4"></div>
    </section>
    <input type="hidden" name="image_id" value="" />
</form>
