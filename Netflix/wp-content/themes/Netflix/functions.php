<?php
    function importAssets() {
        wp_enqueue_style('netflix_styling', get_template_directory_uri() . '/styles/main.css', NULL, microtime());
        // wp_enqueue_style('netflix_styling2', get_stylesheet_uri(), NULL, microtime());
        wp_enqueue_script("netflix_scripts", get_template_directory_uri() . '/scripts/main.js', NULL, microtime(), true);
    }

    add_action('wp_enqueue_scripts' ,'importAssets');
?>