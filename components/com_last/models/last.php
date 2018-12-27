<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.model');

class LastModelLast extends JModelLegacy
{
    public static function getLast()
    {

        $app = JFactory::getApplication();
        $menuitem = $app->getMenu()->getActive();

        $category = $menuitem->query['category'];
        $quantidade = $menuitem->query['quantidade'];

        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__content');
        $query->where('state = 1');

        if(!empty($category))
            $query->where('catid = ' . $category);

        if(!empty($category))
            $query->setLimit($quantidade);

        $query->order('created DESC');

        $db->setQuery($query);

        $item = $db->loadObjectList();

        return $item;
    }

}