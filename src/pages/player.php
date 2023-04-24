<style>
    #player th {
        color: white;
    }

    #player td.active, #player .fa-times {
        cursor: pointer;
    }
</style>
<div id="player">
    <fieldset class="fieldset p-3" >
        <legend>LISTA DE JOGADORES</legend>
        <table id="tabList" class="my-table" >
            <thead>
                <tr>
                    <th></th>
                    <th>PERSONAGEM</th>
                    <th>MISSÃO</th>
                    <th>EXCLUIR</th>
                    <th>JOGADOR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $login = $_SESSION["login"]->login;
                    foreach ($players as $player):
                            $arrow = ($login === $player->login ? "<i class='fa fa-arrow-right'
                            aria-hidden='true' ></i>" : null);
                            if ($player->login !== "admin"): ?>
                        <tr <?= ($login !== $player->login ?: "style='background: #c3d2dd'") ?> >
                            <td><?= (!empty($arrow) ? $arrow : null) ?></td>
                            <td data-character="<?= $player->character_id ?>"><?= $player->personage ?></td>
                            <td><?= $player->name ?></td>
                            <td title="Exclui" data-id="<?= $player->id ?>" data="<?= $player->login ?>">
                            <i class="fa fa-times"></i></td>
                            <td><?= $player->login ?></td>
                        </tr>
                <?php endif; endforeach; ?>
            </tbody>
        </table>
    </fieldset>
</div>
