<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_list_cotas
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base(true) . '/modules/mod_list_cotas/assets/css/style.css');
$document->addScript(JURI::base(true) . '/modules/mod_list_cotas/assets/js/script.js');
$module = JModuleHelper::getModule( 'list_cotas' );

require JModuleHelper::getLayoutPath('mod_list_cotas', $params->get('layout', 'default'));
