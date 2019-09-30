<?php
    // ADD SCRIPTS

    function yts_add_scripts() {
        // Add Main CSS
        wp_enqueue_style('yts-main-style', plugins_url().'/youtubesubs/css/style.css');
        // Add Main JS
        wp_enqueue_script('yts-main-script', plugins_url().'/youtubesubs/js/main.js');
        // Add YouTube API
        wp_register_script('youtube', 'https://apis.google.com/js/platform.js');
        wp_enqueue_script('youtube');
    }

    add_action('wp_enqueue_scripts', 'yts_add_scripts');
?>