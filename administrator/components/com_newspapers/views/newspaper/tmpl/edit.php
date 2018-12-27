<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_newspaper
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$app = JFactory::getApplication();
$assoc = JLanguageAssociations::isEnabled();

$document = JFactory::getDocument();
$document->addStyleSheet('components/com_newspapers/assets/css/newspapers.css');
$document->addScript('components/com_newspapers/assets/js/jquery.maskcpfcnpj.js');
$document->addScript('components/com_newspapers/assets/js/jquery.maskMoney.js');
$document->addScript('components/com_newspapers/assets/js/jquery.noty.packaged.min.js');
$document->addScript('components/com_newspapers/assets/js/jquery.inputmask.bundle.js');
$document->addScript('components/com_newspapers/assets/js/script.js');
?>
<script type="text/javascript">
    Joomla.submitbutton = function (task)
    {
        if (task == 'newspaper.cancel' || document.formvalidator.isValid(document.id('newspaper-form')))
        {
            Joomla.submitform(task, document.getElementById('newspaper-form'));
        }
    }
</script>
<form action="<?php echo JRoute::_('index.php?option=com_newspapers&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="newspaper-form" class="form-validate">

    <?php echo JLayoutHelper::render('joomla.edit.title_alias', $this); ?>
    <div class="form-personalizado">
        <div class="form-horizontal">
            <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', empty($this->item->id) ? JText::_('COM_NEWSPAPER_NEW_NEWSPAPER', true) : JText::_('COM_NEWSPAPER_EDIT_NEWSPAPER', true)); ?>
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid form-horizontal-desktop">
                        <div class="span6">
                            <?php echo $this->form->renderField('image'); ?>
                            <?php echo $this->form->renderField('pdf'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>



            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'publishing', JText::_('JGLOBAL_FIELDSET_PUBLISHING', true)); ?>
            <div class="row-fluid form-horizontal-desktop">
                <div class="span6">
                    <?php echo JLayoutHelper::render('joomla.edit.publishingdata', $this); ?>
                </div>
                <div class="span6">
                    <?php echo JLayoutHelper::render('joomla.edit.global', $this); ?>
                    <?php echo JLayoutHelper::render('joomla.edit.metadata', $this); ?>
                </div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>



            <?php if ($assoc) : ?>
                <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'associations', JText::_('JGLOBAL_FIELDSET_ASSOCIATIONS', true)); ?>
                <?php echo $this->loadTemplate('associations'); ?>
                <?php echo JHtml::_('bootstrap.endTab'); ?>
            <?php endif; ?>

            <?php echo JHtml::_('bootstrap.endTabSet'); ?>
        </div>
    </div>
    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>