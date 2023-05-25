<style>
    #map form, #map section {
        display: flex;
        justify-content: space-around;
        flex-direction: column;
    }
</style>
<div id="map">
    <form id="form_map" action="map/add" method="POST" enctype="multipart/form-data">
        <?php if (empty($act)): ?>
        <div>
            <h3 style="color: white"><?= $mission->name ?></h3>
        </div>
        <div>
            <label class="label-rpg">Nome:</label>
            <input class="input-rpg" type="text" name="name" required/>
            <input id="image" class="input-rpg" type="file" name="image" required/>
        </div>
        <div>
            <label class="label-rpg">Descrição:</label>
            <textarea rows="15" cols="30" class="input-rpg" name="description" required></textarea>
            <img id="thumb_image" src="#" alt="" style="margin: -250px 0 0 150px;">
        </div>
        <?php elseif($act === "edit"): ?>
        <section class="mt-5">
            <img id="thumb_image" src="image/id/<?= $image->id ?>" alt="" height="250px" />
            <input id="image" class="input-rpg" type="file" name="image" />
        </section>
        <?php endif ?>
    </form>
</div>
<script>
    if(typeof(image) !== "undefined") {
        image.onchange = () => {
            thumbImage(image, thumb_image)
        }
    }
</script>
