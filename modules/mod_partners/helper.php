<?php
/**
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * @package		Joomla.Site
 * @subpackage	mod_partners
 * @since		1.5
 */
class modPartnersHelper
{
    public static function getPartners($catid = 1){

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__djimageslider AS dji');
        $query->where('dji.published = 1 AND dji.catid = ' . $catid);

        $db->setQuery($query);
	    $rows = (array) $db->loadObjectList();

        shuffle($rows);

        return $rows;
    }
    
}