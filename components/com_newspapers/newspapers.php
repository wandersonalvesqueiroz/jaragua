<?php
defined('_JEXEC') or die;

$controller = JControllerLegacy::getInstance('Newspapers');
$controller->execute(JRequest::getVar('task', 'click'));
$controller->redirect();
