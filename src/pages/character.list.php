<main id="character">
    <div id="list">
        <section>
            <button class="btn btn-rpg btn-info" value="back" style="margin-top: 115px">Voltar</button>
        </section>
        <section class="left">
            <fieldset class="fieldset btnSelection">
                <legend>Personagens</legend>
                <?php foreach ($characters as $character): ?>
                <button class="btn btn-oval" data-id="<?= $character->id ?>" data-image_id="<?=
                    $character->image_id ?>" data-breed_id="<?= $character->breed_id ?>"
                    data-category_id="<?= $character->category_id ?>" data-story="<?=
                    $character->story ?>" data-mission="<?= $character->mission_id ?>"><?=
                    $character->personage ?></button>
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
</main>
