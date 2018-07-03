<?php
/**
 * Plugin Name: daltonplugin
 * Description: My first Plugin, Embed Material code  on wordpress
 * Plugin URI: http://example.com
 * Author: Dalton.com
 * Version: 1.0.1
 * Author URI: http://daleagle.capolloslounge.co.ke.
 *
 *
 * @category Core
 */

// if ( ! defined( 'ABSPATH' ) ) {
// 	exit;
// 	// Exit if accessed directly.
// }

// if(! defined('ABSPATH')){
// 	die;
// }

// defined ('ABSPATH') or die('Hey you will die here');

if (!function_exists('add_action')) {
    echo 'Hey you stupid';
}

//add_action ('the_content', 'my_thank_you_text');

class DaltonPlugin
{
    public function __construct()
    {
        add_action('init', array($this, 'customposttype'));
    }

    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    private function activate()
    {
        // echo 'The Plugin was activated';
        $this->customposttype();
        flush_rewrite_rules();
    }

    private function deactivate()
    {
    }

    private function uninstall()
    {
        // delete_all_user_settings();
    }

    public function customposttype()
    {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }

    public function enqueue()
    {
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myjs.js', __FILE__));
    }
}

if (class_exists('DaltonPlugin')) {
    $daltonplugin = new DaltonPlugin();
    $daltonplugin->register();
}
//requr=ire files
require_once plugin_dir_path(__FILE__).'inc/dalton-plugin-deactivate.php';

//activation hook
register_activation_hook(__FILE__, array('DaltonPluginActivate', 'activate'));

//deactivate
register_deactivation_hook(__FILE__, array('DaltonPluginDeactivate', 'deactivate'));

//uninstall
//  register_uninstall_hook(__FILE__, array($daltonplugin, 'uninstall'));

//  function my_thank_you_text($fsaf){
// 	return $fsaf ='Creativity is a core feature of any photographer and an attractive looking website is as important as a good portfolio. So this template could be an option for you as it combines simplicity, cool design and functionality. It is also not overloaded with menus and effects; it looks both official and creative. What else is required from a professional CV?  The template is incredibly easy to customize, you can have all the changes accomplished any time you wish in just a couple of minutes.';
// 		}

// function get_excerpt($text, $length = 15){
// 	$length = apply_filters("excerpt_length");

// $excerpt = substr ($text, $length);

// return $excerpt;
// }

// function modify_excerpt_length(){

// 	return 2;
// }

// add_filter("excerpt_length", "modify_excerpt_length");
