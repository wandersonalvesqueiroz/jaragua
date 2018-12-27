<?php

/**
 * @package     Joomla.Administrator
 * @subpackage  com_newspapers
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

/**
 * Newspapers component helper.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_newspapers
 * @since       1.6
 */
class NewspapersHelper
{

    public static function getActions()
    {
        $user = JFactory::getUser();
        $result = new JObject;
        $assetName = 'com_newspapers';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }
        return $result;

    }

}