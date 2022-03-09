<style>
    .side-right {
        float: right;
        margin-top: -10px;[]]
    }
</style>
<?php if(empty($act)): ?>
<form id="form_story" action="#" method="POST">
    <label class="label-rpg">Uma breve história</label>
    <textarea rows="10" cols="80" name="story" class="input-rpg" ></textarea>
</form>
<?php elseif($act === "edit"): ?>
<div class='edit'>
    <form enctype="multipart/form-data" id="myCharacter" action="avatar/save" method="POST">
        <section class="side-left">
            <label class="label-rpg">Jogador: </label>
            <input class="input-rpg" name="name" value="<?= ( strtoupper($login) ?? null) ?>" disabled />
            <input type="hidden" name="name" value="<?= ( strtoupper($login) ?? null) ?>" />
            <label class="label-rpg">Personagem: </label>
            <input class="input-rpg" type="text" name="personage" value="<?= ($character->personage ?? null) ?>" data-id="<?= $character->id ?>" required>
            <div style="flex-grow: 2">
                <label class="label-rpg">Raça:</label>
                <input class="input-rpg" type="text" name="breed" value="<?= $breed->name ?>" />
                <label class="label-rpg">Classe: </label>
                <input class="input-rpg" type="text" name="category" value="<?= $category->name ?>" />
            </div>
            <div>
                <label class="label-rpg">Tendência 1: </label>
                <input class="input-rpg" type="text" name="trebd1" value="<?= $character->trend1 ?>" />
                <label class="label-rpg">Tendência 2: </label>
                <input class="input-rpg" type="text" name="trend2" value="<?= $character->trend2 ?>" />
            </div>
            <div>
                <label class="label-rpg">Uma Breve História</label>
                <textarea class="input-rpg"><?= $character->story ?></textarea>
            </div>
        </section>
        <section id="avatar" class="side-right" >
            <img src="image/id/<?= $character->image_id ?>" alt="" height="300px"/>
        </section>
    </form>
</div>
<?php endif ?>
