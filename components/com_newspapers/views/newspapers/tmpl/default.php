<?php

defined('_JEXEC') or die('Restricted access');

$document = JFactory::getDocument();

?>
<div class="newspapers">
    <div class="list-newspapers">
        <?php foreach ($this->newspapers as $newspaper): ?>
            <div class="newspaper">
                <?php
                $image = 'images/clube_jaragua.jpg';
                if (!empty($newspaper->image)) {
                    $image = $newspaper->image;
                }
                ?>
                <h1>
                    <a href="<?= $newspaper->pdf ?>"  target="_blank">
                        <?= $newspaper->name; ?>
                    </a>
                </h1>
                <div class="newspaper-img" style="background-image: url(<?php echo $image; ?>)">
                    <a href="<?= $newspaper->pdf ?>" target="_blank" >
                        <span>
                            <i class="fas fa-download"></i>
                        </span>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        jQuery(function ($) {
            $(window).on('resize', function () {

                $('.newspaper-img').each(function () {
                    $(this).height($(this).width() * 1.41);
                });

            }).trigger('resize');
        });
    </script>
