<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.model');

class NewspapersModelNewspapers extends JModelLegacy
{
    public static function getNewspapers()
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__newspapers As n');
        $query->where('n.published = 1');
        $query->order('n.created DESC');

        $db->setQuery($query);

        $item = $db->loadObjectList();

        return $item;
    }

}