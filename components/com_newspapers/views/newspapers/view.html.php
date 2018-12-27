<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class NewspapersViewNewspapers extends JViewLegacy {

    protected $newspapers;

    function display($tpl = null) {

        $this->newspapers = $this->get('Newspapers');

        $doc = JFactory::getDocument();
        $doc->addStyleSheet('components/com_newspapers/css/style.css');
        parent::display($tpl);
    }
}
