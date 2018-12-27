<?php
defined('_JEXEC') or die;

$controller = JControllerLegacy::getInstance('Last');
$controller->execute(JRequest::getVar('task', 'click'));
$controller->redirect();
