<section id="form-cota">
    <div class="form-cota">
        <?php if($params->get('text_intro')): ?>
            <div id="desc-cota">
            <?= $params->get('text_intro') ?>
            </div>
        <?php endif; ?>
        <div id="retornoHTML">
            <form>
                <fieldset>
                    <input id="nome" type="text" placeholder="Nome" required><br>
                    <input id="email" type="email" placeholder="E-mail" required><br>
                    <input id="cota" type="text" placeholder="Cota" required><br>
                    <?php if ($telefone == 1): ?>
                        <input id="phone" type="tel" placeholder="Telefone"><br>
                    <?php endif; ?>
                    <?php if ($celular == 1): ?>
                        <input id="cell" type="tel" placeholder="Celular"><br>
                    <?php endif; ?>
                    <input id="email_admin" type="hidden" name="email_admin" value="<?php echo $email_admin; ?>"/>
                    <input id="subject" type="hidden" name="subject" value="<?php echo $subject; ?>"/>
                    <input id="sucesso" type="hidden" name="sucesso" value="<?php echo $sucesso; ?>"/>
                    <input id="erro" type="hidden" name="erro" value="<?php echo $erro; ?>"/>
                    <input type="button" id="btn" class="btn" value="<?= (!empty($enviar)) ? $enviar : 'Enviar'; ?>">
                    <div class="loading">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</section>
