<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_partners
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base(true) . '/modules/mod_partners/assets/css/style.css');
$partners = modPartnersHelper::getPartners($params->get('catid'));
$module = JModuleHelper::getModule( 'partners' );

require JModuleHelper::getLayoutPath('mod_partners', $params->get('layout', 'default'));
