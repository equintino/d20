<style>
    #editMission {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
    }
</style>
<section id="editMission">
    <form id="form_mission" method="POST" action="mission/save" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?= $mission->id ?>" />
        <section>
            <div>
                <label class="label-rpg">Nome:</label>
                <input class="input-rpg" type="text" name="name" size="50"value="<?= $mission->name ?>"/>
            </div>
            <div>
                <label class="label-rpg">Local:</label>
                <input class="input-rpg" type="text" name="place" size="50" value="<?= $mission->place ?>"/>
            </div>
            <div>
                <label class="label-rpg">História:</label>
                <textarea class="input-rpg" rows="5" cols="48" type="text" name="story" style="text-transform: none" ><?= $mission->story ?></textarea>
            </div>
        </section>
    </form>
</section>
