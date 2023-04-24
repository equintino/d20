<style>
    #avatarList #imageAvatar {
        height: 350px;
        width: 350px;
        margin: auto;
        top: 15%;
    }
</style>
<main id="avatarList">
    <div style="float: left">
        <?php if ($source !== "character"): ?>
        <section>
            <label class="label-rpg">Raça:</lebel>
            <select name="breed" class="input-rpg" >
                <?php foreach($breeds as $breed): ?>
                <option value="<?= $breed->id ?>" data-description="<?= $breed->description ?>"
                    <?= ($breed->id == $breedId ? "selected"
                    : null) ?>><?= $breed->name ?>
                </option>
                <?php endforeach ?>
            </select>
        </section>
        <section>
            <label class="label-rpg">Classe:</lebel>
            <select name="class" class="input-rpg" >
                <?php foreach($categories as $category): ?>
                <option value="<?= $category->id ?>" <?= ($category->id == $categoryId ? "selected"
                    : null) ?>><?= $category->name ?></option>
                <?php endforeach ?>
            </select>
        </section>
        <?php endif ?>
        <section>
            <div id="breed_description">
            <label class="label-rpg">Características:</lebel><br>
            <textarea class="input-rpg" disabled rows="10" ><?= ($currentCat->description
                ?? "Sem descrição") ?></textarea>
            </div>
        </section>
    </div>
    <section class="wrapper">
        <div id="imageAvatar" class="mt-4">
            <?php foreach($list as $avatar): ?>
                <img data-id="<?= $avatar["id"] ?>" src="image/id/<?= $avatar["image_id"] ?>" alt="" height="350px"/>
            <?php endforeach; ?>
        </div>
    </section>
</main>
