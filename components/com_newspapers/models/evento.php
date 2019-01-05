<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');


class DoingsModelEvento extends JModelLegacy
{

    public static function getEvento($id = '')
    {
        $id = JRequest::getVar('id');

        $results = '';
        if (!empty($id)) {
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);
            $query->select('d.id AS id,
                            d.name AS name,
                            d.image AS image,
                            d.date_start AS date_start,
                            d.date_end AS date_end,
                            d.hour_start AS hour_start,
                            d.hour_end AS hour_end,
                            d.local AS local,
                            d.subscription AS subscription,
                            d.description AS description,
                            c.description AS city,
                            c.uf AS uf
                            ');
            $query->from('#__doings As d');
            $query->join('LEFT','#__cities As c ON d.id_city = c.id');
            $query->where('d.published = 1');
            $query->where('d.id = ' . $id);

            $db->setQuery($query);
            $results = $db->loadObjectList();
        }
        return $results;

    }

}