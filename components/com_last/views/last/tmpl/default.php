<?php

defined('_JEXEC') or die('Restricted access');

if(!class_exists('ContentHelperRoute'))
    require_once (JPATH_SITE . '/components/com_content/helpers/route.php');

$document = JFactory::getDocument();

$app = JFactory::getApplication();
$menuitem = $app->getMenu()->getActive();
$textLink = $menuitem->query['link_text'];
$titulo = $menuitem->params['page_heading'];

?>
<div id="last">
    <hr>
    <h1><?= $titulo ?></h1>
    <div class="list-last">
        <?php foreach ($this->last as $last): ?>
            <div class="last">
                <?php
                $images = json_decode($last->images);
                if (empty(htmlspecialchars($images->image_intro))) {
                    $images->image_intro = 'images/clube_jaragua.jpg';
                }
                ?>

                <div class="last-desc">
                    <div class="last-img">
                        <a href="<?= JRoute::_(ContentHelperRoute::getArticleRoute( $last->id . ':' . $last->alias  , $last->catid)) ?>">
                        <span style="background-image: url('<?= htmlspecialchars($images->image_intro); ?>');"></span>
                        </a>
                    </div>
                    <h2>
                        <a href="<?= JRoute::_(ContentHelperRoute::getArticleRoute( $last->id . ':' . $last->alias  , $last->catid)) ?>">
                            <?= $last->title; ?>
                        </a>
                    </h2>
                    <div>
                        <a href="<?= JRoute::_(ContentHelperRoute::getArticleRoute( $last->id . ':' . $last->alias  , $last->catid)) ?>">
                            <?= $last->introtext; ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <p class="all-last">
            <a href="<?= JRoute::_(ContentHelperRoute::getCategoryRoute($last->catid)) ?>" class="btn btn-last">
                <?= $textLink ?> <i class="fas fa-angle-double-right"></i>
            </a>
        </p>
    </div>


    <script>
        jQuery(function ($) {
            $(window).on('resize', function () {

                $('.last-img').each(function () {
                    $(this).height($(this).width());
                });

            }).trigger('resize');
        });
    </script>
