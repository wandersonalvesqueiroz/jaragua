<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');


class DoingsModelInscrever extends JModelLegacy
{

    public static function getInscrever($id = '')
    {
        $id = JRequest::getVar('id');

        $results = '';
        if (!empty($id)) {
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);
            $query->select('d.id AS id,
                            d.name AS name
                            ');
            $query->from('#__doings As d');
            $query->where('d.id = ' . $id);

            $db->setQuery($query);
            $results = $db->loadObjectList();
        }
        return $results;

    }

}