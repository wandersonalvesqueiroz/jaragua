<div id="modcolaborators">

    <h2><?= $params->get('title') ?></h2>

    <ul class="list-colaborators">
        <?php
        $colaborators = explode(PHP_EOL, $params->get('colaborators'));
        foreach ($colaborators as $colaborator):
        ?>
            <li>

                <?php
                $colaborator_itens = explode(';', $colaborator);
                $nomeColab = '';
                $cargoColab = '';
                $fotoColab = '';
                foreach ($colaborator_itens as $colaborator_item):

                    $posNome = strpos($colaborator_item, 'nome=');
                    if ($posNome !== false) {
                        $nomeColab = trim($colaborator_item);
                    }

                    $posCargo = strpos($colaborator_item, 'cargo=');
                    if ($posCargo !== false) {
                        $cargoColab = trim($colaborator_item);
                    }

                    $posFoto = strpos($colaborator_item, 'foto=');
                    if ($posFoto !== false) {
                        $fotoColab = trim($colaborator_item);
                    }

                    ?>


                <?php endforeach; ?>

                <?php if(!empty($fotoColab) && !empty($fotoColab)): ?>
                    <figure>
                        <span style="background-image: url('<?= substr($fotoColab,5) ?>')"></span>
                    </figure>

                    <p>
                        <?= substr($nomeColab,5) ?>

                        <?php if(!empty($cargoColab)): ?>
                            <br><small>(<?= substr($cargoColab,6) ?>)</small>
                        <?php endif; ?>

                    </p>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>

</div>