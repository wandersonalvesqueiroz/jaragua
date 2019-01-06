<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class DoingsViewInscrever extends JViewLegacy {

    function display($tpl = null) {

        $doc = JFactory::getDocument();
        $doc->addStyleSheet('components/com_doings/css/style.css');
        $doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap.min.css');
        $doc->addStyleSheet($this->baseurl . '/media/jui/css/bootstrap-responsive.min.css');
        $doc->addScript('components/com_doings/js/jquery.inputmask.bundle.js');
        $doc->addScript('components/com_doings/js/jquery.maskcpfcnpj.js');
        $doc->addScript('components/com_doings/js/jquery.maskedinput.min.js');
        $doc->addScript('components/com_doings/js/jquery.noty.packaged.min.js');
        $doc->addScript('components/com_doings/js/script.js');

        $this->inscrever = $this->get('Inscrever');

        parent::display($tpl);
    }
}
