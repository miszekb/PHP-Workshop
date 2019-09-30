<?php
/**
* @package AlecadddPlugin
*/

/*
Plugin Name: Alecaddd Plugin
Plugin URI: http://mbialecki.pl
Description: This is my second plugin
Version: 1.0.0
Author: Michał Białecki
Author URI: mbialecki.pl
License: GPLv2 or later
Text Domain: alecaddd
*/

if (!defined('ABSPATH')) {
    die;
}

class AlecadddPlugin {

    function __construct() {
        add_action('init', array($this, 'custom_post_type'));
    }

    function activate(){
        flush_rewrite_rules();
    }

    function deactivate() {

    }

    function uninstall() {

    }

    function custom_post_type() {
        register_post_type('book', array('public' => true, 'label' => 'Books'));
    }
}

if(class_exists('AlecadddPlugin')) {
    $alecadddPlugin = new AlecadddPlugin();
}

// activation

register_activation_hook(__FILE__, array( $alecadddPlugin, 'activate'));

// deactivation

register_activation_hook(__FILE__, array( $alecadddPlugin, 'deactivate'));

// uninstall