<div id="modnewspapers">

    <?php
    foreach ($newspapers as $newspaper):
        $image = $newspaper->image;
        $pdf = $newspaper->pdf;
    ?>
        <h3><?= $newspaper->name ?></h3>
        <div class="newspaper-box">
            <?php if ($pdf): ?>
            <a href="<?= $pdf; ?>" target="_blank" class="newspaper" style="background-image: url('<?= $image ?>'); "></a>
            <?php else: ?>
            <div class="newspaper" style="background-image: url('<?= $image ?>'); "></div>
            <?php endif; ?>
        </div>

    <?php endforeach; ?>

    <div>
        <p class="all-newspapers">
            <a href="<?= JRoute::_('index.php?Itemid=' .$params->get('itemmenu')) ?>" class="btn btn-newspapers">
                Mais edições <i class="fas fa-angle-double-right"></i>
            </a>
        </p>
    </div>

</div>