<?php
/**
 * @version 2.2.3
 * @package JEM
 * @subpackage JEM Teaser Module
 * @copyright (C) 2013-2017 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die;

if ($params->get('use_modal', 0)) {
    JHtml::_('behavior.modal', 'a.flyermodal');
    $modal = 'flyermodal';
} else {
    $modal = 'notmodal';
}

?>

<div class="jemmoduleteaser<?php echo $params->get('moduleclass_sfx') ?>" id="jemmoduleteaser">
    <h1>
        <a href="<?= JRoute::_('index.php?Itemid='.$params->get('menuevent')) ?>" ><?= $module->title ?></a>
    </h1>
    <div class="eventset" summary="mod_jem_teaser">
        <?php if (count($list)) : ?>
            <?php foreach ($list as $item) : ?>
                <div class="eventbox">
                    <div class="event-calendar">
                        <div class="calendar"
                             title="<?php echo strip_tags($item->dateinfo); ?>">
                            <div class="monthteaser">
                                <?php echo $item->month; ?>
                            </div>
                            <div class="daynumteaser">
                                <?php echo empty($item->daynum) ? '?' : $item->daynum; ?>
                            </div>
                        </div>
                    </div>
                    <div class="event-vencat">
                        <h2 class="event-title">
                            <?php if ($item->eventlink) : ?>
                                <a href="<?php echo $item->eventlink; ?>"
                                   title="<?php echo $item->fulltitle; ?>"><?php echo $item->title; ?></a>
                            <?php else : ?>
                                <?php echo $item->title; ?>
                            <?php endif; ?>
                        </h2>

                        <?php if ($item->date) : ?>
                            <h4 class="event-date">
                                <a href="<?php echo $item->eventlink; ?>">
                                    <?= $item->date ?>
                                    <?php if ($item->time) : ?>
                                        <?= '(' . $item->alltime . ')' ?>
                                    <?php endif; ?>
                                </a>
                            </h4>
                        <?php endif; ?>

                        <?php if ($item->eventdescription) : ?>
                            <div class="event-description">
                                <a href="<?php echo $item->eventlink; ?>">
                                    <?php echo $item->eventdescription; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <div>
                <p class="all-events">
                    <a href="<?= JRoute::_('index.php?Itemid='.$params->get('menuevent')) ?>" class="btn btn-all-events">
                        Agenda completa <i class="fas fa-angle-double-right"></i>
                    </a>
                </p>
            </div>
        <?php else : ?>
            <?php echo JText::_('MOD_JEM_TEASER_NO_EVENTS'); ?>
        <?php endif; ?>
    </div>
</div>