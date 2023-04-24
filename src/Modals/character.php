<style>
    #edit_character .side-right {
        position: absolute;
        right: 10;
        top: 40;
    }
</style>
<?php if (empty($act)): ?>
<form id="form_story" action="#" method="POST">
    <label class="label-rpg">Uma breve história</label>
    <textarea rows="10" cols="80" name="story" class="input-rpg" ></textarea>
</form>
<?php elseif ($act === "edit"): ?>
<div id='edit_character'>
    <form enctype="multipart/form-data" id="myCharacter" action="avatar/save" method="POST">
        <section class="side-left">
            <label class="label-rpg">Jogador: </label>
            <input class="input-rpg" name="name" value="<?= ( strtoupper($login->login) ?? null) ?>" disabled />
            <input type="hidden" name="name" value="<?= ( strtoupper($login->login) ?? null) ?>" />
            <input type="hidden" name="id" value="<?= $character->id ?>" />
            <label class="label-rpg">Personagem: </label>
            <input class="input-rpg" type="text" name="personage" value="<?= ($character->personage ??
            null) ?>" data-id="<?= $character->id ?>" required <?= ($mission ? "disabled" : null) ?>>
            <div style="flex-grow: 2">
                <label class="label-rpg">Raça:</label>
                <select name="breed_id" class="input-rpg" <?= ($mission ? "disabled" : null) ?>>
                    <?php foreach ($breeds as $breed): ?>
                    <option value="<?= $breed->id ?>" data-description="<?= $breed->description ?>"
                        <?= ($character->breed_id === $breed->id ?
                        "selected" : null) ?>><?= $breed->name ?>
                    </option>
                    <?php endforeach ?>
                </select>
                <label class="label-rpg">Classe: </label>
                <select id="myClass" name="category_id" class="input-rpg" <?= ($mission ? "disabled" : null) ?>>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id ?>" <?= ($character->category_id === $category->id ?
                    "selected" : null) ?>><?= $category->name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label class="label-rpg">Tendência 1: </label>
                <select name="trend1" class="input-rpg" <?= ($mission ? "disabled" : null) ?>>
                    <?php foreach ($trends1 as $key => $trend1 ): ?>
                    <option value="<?= $key ?>" <?= ($character->trend1 === $key ? "selected"
                    : null) ?>><?= $trend1 ?></option>
                    <?php endforeach ?>
                </select>
                <label class="label-rpg">Tendência 2: </label>
                <select name="trend2" class="input-rpg" <?= ($mission ? "disabled" : null) ?>>
                    <?php foreach ($trends2 as $key => $trend2 ): ?>
                    <option value="<?= $key ?>" <?= ($character->trend2 === $key ? "selected"
                    : null) ?>><?= $trend2 ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label class="label-rpg">Uma Breve História</label>
                <textarea class="input-rpg" rows="10" cols="60" name="story" <?= ($mission ? "disabled"
                : null) ?>><?= $character->story ?></textarea>
            </div>
        </section>
        <section id="avatar" class="side-right" >
            <input name="image_id" type="hidden" value="<?= $character->image_id ?>" />
            <img data-image_id="<?= $character->image_id ?>" src="image/id/<?= $character->image_id ?>"
             alt="" height="300px"/>
            <p class="label-rpg"><?= ($mission ? "Em Missão: <strong><i style='font-size: 1.1em'>
            {$mission->name}</i></strong>" : null) ?></p>
        </section>
    </form>
</div>
<?php endif ?>
