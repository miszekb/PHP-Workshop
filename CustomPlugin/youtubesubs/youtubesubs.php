<?php
/*
Plugin Name: YouTube Subs
Plugin URI: http://mbialecki.pl
Description: YT Subs display
Version: 0.1.0
Author: Michał Białecki
Author URI:  http://mbialecki.pl
*/

// Exit if accessed directly

if (!defined('ABSPATH')) {
    exit;
}

// Load scripts
require_once(plugin_dir_path(__FILE__).'/includes/youtubesubs-scripts.php');
require_once(plugin_dir_path(__FILE__).'/includes/youtubesubs-class.php');

// Register Widget 

function register_youtubesubs() {
    register_widget('Youtube_Subs_Widget');
}

// Hook in function

add_action('widgets_init', 'register_youtubesubs');