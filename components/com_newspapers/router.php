<?php

defined('_JEXEC') or die;

class NewspapersRouter extends JComponentRouterBase{

    public function build(&$query)
    {

        $segments = array();

        if(isset($query['view']))
        {
            $segments[] = $query['view'];
            unset($query['view']);
        };

        if(isset($query['id']))
        {
            $segments[] = $query['id'];
            unset($query['id']);
        };

        return $segments;

    }

    public function parse(&$segments)
    {

        $vars = array();

        $vars['view'] = $segments[0];


        if(isset($segments[1])){
            $vars['id'] = $segments[1];
        }

        return $vars;

    }
}

function newspapersBuildRoute(&$query)
{
    $router = new NewspapersRouter;

    return $router->build($query);
}

function newspapersParseRoute($segments)
{
    $router = new NewspapersRouter;

    return $router->parse($segments);
}
