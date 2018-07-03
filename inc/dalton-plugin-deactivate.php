<?php
/*
*
* @package category
*
*
*/

class DaltonPluginDeactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
