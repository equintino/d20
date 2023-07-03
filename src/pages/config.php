<style>
    #config {
        margin-top: 40px;
    }
</style>
<div id="config">
    <div class="table-conf">
        <fieldset class="fieldset" >
            <legend>BANCO DE DADOS</legend>
            <table aria-describedby="List of access to the bank" id="tab-conf" class="my-table" >
                <thead>
                    <tr>
                        <th scope=1></th>
                        <th scope=2>NOME</th>
                        <th scope=3>TIPO</th>
                        <th scope=4>ENDEREÇO</th>
                        <th scope=5>NOME DO BANCO</th>
                        <th scope=6>USUÁRIO</th>
                        <th scope=7 colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $localSelected = $config->getConfConnection();
                        echo '<pre>';
                        foreach($config::$dataFile as $local => $params):
                            $type = strstr($params->dsn, ':', true);
                            $adreess = substr(strstr(strstr(strstr($params->dsn, ':'), ';', true), '='), 1);
                            $dbname = explode('=', $params->dsn);
                            $db = array_pop($dbname);
                            $active = null;
                            $background = null;
                            $arrow = null;
                            // $config->local = $local;
                            if($localSelected === $local) {
                                // $active = "*";
                                $arrow = "<i class='fa fa-arrow-right' aria-hidden='true' style='color: white'></i>";
                                $background = "#5d5d5d";
                            } ?>
                    <tr style="border: 1px solid <?= $background ?>; border-left: none; border-right: none">
                        <td><?= (!empty($arrow) ? $arrow : null) ?></td>
                        <td><?= $local ?></td>
                        <!-- <td><?= $config->type() ?></td> -->
                        <td><?= $type ?></td>
                        <td><?= $adreess ?></td>
                        <td><?= $db ?></td>
                        <td><?= $params->user ?></td>
                        <td class="icon-edition"><span class="fa fa-pencil edition" action="edit"></span></td>
                        <td class="icon-edition"><span class="fa fa-trash delete" action="delete"></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
        </fieldset>
        <button class="btn btn-rpg btn-danger" style="float: right; margin: -5px 40px"
            action="add" value="add">Adcionar</button>
    </div>
</div>
