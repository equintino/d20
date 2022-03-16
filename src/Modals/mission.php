<style>
    #editMission {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    #editMission #galery {
        width: 280px;
    }

    #editMission table th {
        color: white;
        text-transform: uppercase;
        text-align: center;
    }

    #editMission table td {
        color: white;
        text-align: center;
    }
</style>
<form id="form_mission" method="POST" action="mission/save" enctype="multipart/form-data" >
    <main id="editMission">
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
            <div>
                <chapter class="label-rpg">Adicionar personagens:</chapter>
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Jogador</th>
                            <th>Personagem</th>
                            <th>Tendência 1</th>
                            <th>Tendência 2</th>
                            <th>História</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($characters as $character):
                            $checked = (in_array($character->id, $personages) ? "checked" : "null") ?>
                        <tr>
                            <td><input class="input-rpg" type="checkbox" name="personages[]" value="<?= $character->id ?>" <?= $checked ?>/></td>
                            <td><?= $character->name ?></td>
                            <td><?= $character->personage ?></td>
                            <td><?= $character->trend1 ?></td>
                            <td><?= $character->trend2 ?></td>
                            <td><?= $character->story ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</form>
