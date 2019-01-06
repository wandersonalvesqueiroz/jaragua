<div id="modlistcotas">
    <ul class="list-cotas">
        <?php
        $list_cotas = explode(PHP_EOL, $params->get('list_cotas'));
        foreach ($list_cotas as $cotas):
            ?>
            <li>
                <div>
                <?php
                    $cotas_itens = explode(';', $cotas);
                    $nomeAssoc = '';
                    $telefoneAssoc = '';
                    $emailAssoc = '';
                    foreach ($cotas_itens as $cota):

                        $posNome = strpos($cota, 'nome=');
                        if ($posNome !== false) {
                            $nomeAssoc = trim($cota);
                        }

                        $posTelefone = strpos($cota, 'telefone=');
                        if ($posTelefone !== false) {
                            $telefoneAssoc = trim($cota);
                        }

                        $posEmail = strpos($cota, 'email=');
                        if ($posEmail !== false) {
                            $emailAssoc = trim($cota);
                        }
                    endforeach;
                ?>

                <?php
                $arrayNome = explode('/', substr($nomeAssoc, 5));
                $arrayTelefone = explode('/', substr($telefoneAssoc, 9));
                $arrayEmail = explode('/', substr($emailAssoc, 6));
                ?>

                <?php if (!empty($arrayNome) && (!empty($arrayTelefone) || !empty($arrayEmail))): ?>

                    <?php if (!empty($arrayNome)): ?>
                        <?php foreach($arrayNome as $nome): ?>
                            <h1><?= $nome ?></h1>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (!empty($arrayTelefone)): ?>
                        <?php foreach($arrayTelefone as $telefone): ?>
                            <h4><?= $telefone ?></h4>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (!empty($arrayEmail)): ?>
                        <p>
                        <?php
                        $count=0;
                        foreach($arrayEmail as $email):
                            if($count>0)
                                echo '<br>';
                        ?>
                            <a href="mailto:<?= $email ?>"><?= $email ?></a>
                        <?php
                            $count++;
                        endforeach;
                        ?>
                        </p>
                    <?php endif; ?>


                <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

</div>