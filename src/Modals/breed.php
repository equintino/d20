<style>
    #content {
        height: 500px;
    }

    #edit form {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<div id="breeed" class="mt-4">
    <div id="edit">
        <form id="form-breed" method="POST" action="breed/save" enctype="multipart/form-data" >
            <section>
                <div>
                    <label class="label-rpg">Tipo:</label>
                    <input class="input-rpg" type="text" name="name" value="<?= $breed->name ?>"/>
                    <input type="hidden" name="id" value="<?= $breed->id ?>" />
                </div>
                <div>
                    <label class="label-rpg">Descrição:</label>
                    <textarea class="input-rpg" rows="5" cols="48" type="text" name="description"
                        style="text-transform: none" ><?= $breed->description ?></textarea>
                </div>
            </section>
            <section class="side-right" style="text-align: center">
                <img id="thumb_image" src="image/id/<?= $breed->image_id ?>" alt="" height="250px"/>
                <input class="input-rpg" id="image" type="file" name="image" />
            </section>
        </form>
    </div>
</div>
<script>
    image.onchange = () => {
        thumbImage(image, thumb_image)
    }
</script>
