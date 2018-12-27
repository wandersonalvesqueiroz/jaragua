<?php
/**
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * @package		Joomla.Site
 * @subpackage	mod_newspaper
 * @since		1.5
 */
class modNewspaperHelper
{
    public static function getNewspaper(){

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__newspapers AS n');
        $query->where('n.published = 1');
        $query->order('n.created DESC');
        $query->setLimit(1);

        $db->setQuery($query);
	    $rows = (array) $db->loadObjectList();

        return $rows;
    }
    
}