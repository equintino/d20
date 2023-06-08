<style>
    #content {
        height: 500px;
    }

    .galery {
        padding: 20px;
        background: black;
        width: 50%;
        margin: auto;
    }

    .photos {
        cursor: pointer;
        display: flex;
        border-radius: 5px;
        padding: 10px;
    }

    .arrow {
        display: flex;
        justify-content: center;
        font-size: 2em;
    }

    .arrow i {
        padding: 5px;
        cursor: pointer;
        color: gray;
    }

    .arrow i:hover {
        color: black;
    }

    #edit {
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<div id="category" class="mt-4">
    <form id="form_edit" method="POST" action="category/save" enctype="multipart/form-data" >
        <div id="edit">
            <section>
                <div>
                    <label class="label-rpg">Tipo:</label>
                    <input class="input-rpg" type="text" name="name" value="<?= $category->name ?>"/>
                    <input type="hidden" name="id" value="<?= $category->id ?>" />
                </div>
                <div>
                    <label class="label-rpg">Descrição:</label>
                    <textarea class="input-rpg" rows="5" cols="48" type="text" name="description"
                        style="text-transform: none" required><?= $category->description ?></textarea>
                </div>
            </section>
            <section class="side-right" style="text-align: center">
                <img id="thumb_image" src="image/id/<?= $category->image_id ?>" alt="" height="150px"/>
                <input class="input-rpg" id="image" type="file" name="image" />
            </section>
        </div>
    </form>
</div>
