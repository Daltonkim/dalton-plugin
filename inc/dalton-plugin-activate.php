<?php
/*
*
* @package category
*
*
*
*
*
*
*
*
*/

class DaltonPluginActivate
{
    public static function activate()
    {
        echo 'Test';
        flush_rewrite_rules();
    }
}
