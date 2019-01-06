<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class DoingsViewEvento extends JViewLegacy {

    function display($tpl = null) {

        $doc = JFactory::getDocument();
        $doc->addStyleSheet('components/com_doings/css/style.css');

        $this->evento = $this->get('Evento');

        parent::display($tpl);
    }
}
