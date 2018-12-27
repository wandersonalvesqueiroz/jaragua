<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class LastViewLast extends JViewLegacy {

    protected $last;

    function display($tpl = null) {

        $this->last = $this->get('Last');

        $doc = JFactory::getDocument();
        $doc->addStyleSheet('components/com_last/css/style.css');
        parent::display($tpl);
    }
}
