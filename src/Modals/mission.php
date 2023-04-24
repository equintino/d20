<main id="editMission">
    <form id="form_mission" method="POST" action="mission/save" enctype="multipart/form-data" >
    <?php if (!empty($act) && $act === "mission_request"): ?>
        <session>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Personagem</th>
                        <th>Jogador</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($players as $player): ?>
                    <input type="hidden" name="player" value="<?= $player->login ?>" />
                    <input type="hidden" name="mission_id" value="<?= $mission_id ?>" />
                    <tr>
                        <td><input class="input-rpg" type="radio" name="character_id"
                            value="<?= $player->id ?>"/></td>
                        <td><?= $player->personage ?></td>
                        <td><?= $player->login ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </session>
    <?php else: ?>
        <input type="hidden" name="id" value="<?= ($mission->id ?? null) ?>" />
            <section>
                <div>
                    <label class="label-rpg">Nome:</label>
                    <input class="input-rpg" type="text" name="name" size="50"value="<?= ($mission->name ?? null) ?>"/>
                </div>
                <div>
                    <label class="label-rpg">Local:</label>
                    <input class="input-rpg" type="text" name="place" size="50"
                        value="<?= ($mission->place ?? null) ?>"/>
                </div>
                <div>
                    <label class="label-rpg">História:</label>
                    <textarea class="input-rpg" rows="5" cols="48" type="text" name="story"
                    style="text-transform: none" ><?= ($mission->story ?? null) ?></textarea>
                </div>
                <div>
                    <chapter class="label-rpg">Adicionar Personagens:</chapter>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Jogador</th>
                                <th>Personagem</th>
                                <th>Tendência1</th>
                                <th>Tendência2</th>
                                <th width="25%">História</th>
                                <th>Solicitação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($characters)):
                                foreach ($characters as $character):
                                if (!in_array($character->id, $personages)): ?>
                            <tr>
                                <td><input class="input-rpg" type="checkbox" name="personages-add[]"
                                value="<?= $character->id ?>"/></td>
                                <td><?= $character->login ?></td>
                                <td><?= $character->personage ?></td>
                                <td><?= $character->trend1 ?></td>
                                <td><?= $character->trend2 ?></td>
                                <td><?= $character->story ?></td>
                                <td><?= ($missionRequest($character->id, $mission->id)
                                    ? '<i class="fa fa-thumbs-up" aria-hidden="true"></i>' : null) ?></td>
                            </tr>
                            <?php endif; endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <chapter class="label-rpg">Remover Personagens:</chapter>
                    <table class="table" id="personage">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Jogador</th>
                                <th>Personagem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($characters)):
                                foreach ($characters as $character):
                                $checked = (in_array($character->id, $personages) ? "checked" : "null");
                                if (in_array($character->id, $personages)): ?>
                            <tr>
                                <td><input class="input-rpg" type="checkbox" name="personages-remove[]"
                                value="<?= $character->id ?>" <?= ($checked ?? null) ?> /></td>
                                <td><?= $character->login ?></td>
                                <td><?= $character->personage ?></td>
                            </tr>
                            <?php endif; endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </form>
    <?php endif ?>
</main>
