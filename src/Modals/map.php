<style>
    #map form, #map section {
        display: flex;
        justify-content: space-around;
        flex-direction: column;
    }
</style>
<div id="map">
    <form id="form_map" action="map/add" method="POST" enctype="multipart/form-data">
        <?php //if (empty($act)): ?>
        <input type="hidden" name="id" value="<?= ($map->id ?? null) ?>"/>
        <input type="hidden" name="mission_id" value="<?= ($map->mission_id ?? $mission->id) ?>" />
        <div>
            <h3 style="color: white"><?= ($mission->name ?? null) ?></h3>
        </div>
        <div>
            <label class="label-rpg">Nome:</label>
            <input class="input-rpg" type="text" name="name" value="<?= ($map->name ?? null) ?>" required/>
            <input id="image" class="input-rpg" type="file" name="image" required/>
        </div>
        <div>
            <label class="label-rpg">Descrição:</label>
            <textarea rows="15" cols="30" class="input-rpg" name="description"
                required><?= ($map->description ?? null) ?></textarea>
            <img id="thumb_image" src="<?= (!empty($image->id) ? 'image/id/' . $image->id : '#') ?>"
                alt="" style="margin: -250px 0 0 150px;" height="200px">
        </div>
        <?php //elseif($act === "edit"): ?>
        <input type="hidden" name="image_id" value="<?= ($image->id ?? null) ?>" />
        <section>
            <!-- <img id="thumb_image" src="image/id/<?= $image->id ?>" alt="" width="350px" /> -->
            <!-- <input id="image" class="input-rpg" type="file" name="image" /> -->
        </section>
        <?php //endif ?>
    </form>
</div>
