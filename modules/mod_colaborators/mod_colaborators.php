<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_colaborators
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base(true) . '/modules/mod_colaborators/assets/css/style.css');
$document->addScript(JURI::base(true) . '/modules/mod_colaborators/assets/js/script.js');
$module = JModuleHelper::getModule( 'colaborators' );

require JModuleHelper::getLayoutPath('mod_colaborators', $params->get('layout', 'default'));
