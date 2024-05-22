<?php
/*
Plugin Name: React Plugin
Description: A plugin to render React components via shortcodes.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Enqueue React and our custom script
function enqueue_react_scripts() {
    // Enqueue the built React script
    wp_enqueue_script(
        'react-app',
        plugins_url('/build/static/js/main.1df22997.js', __FILE__), // Adjust the path to your build file
        ['wp-element'], // Ensures the wp-element script (React) is loaded
        '1.0',
        true
    );

    // Enqueue the built React CSS, if it exists
    if (file_exists(plugin_dir_path(__FILE__) . 'build/static/css/main.css')) {
        wp_enqueue_style(
            'react-app-css',
            plugins_url('/build/static/css/main.css', __FILE__)
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_react_scripts');

// Shortcode for Home Page
function render_home_page() {
    return '<div id="react-home-page"></div>';
}
add_shortcode('react_home_page', 'render_home_page');

// Shortcode for Product Page
function render_product_page() {
    return '<div id="react-product-page"></div>';
}
add_shortcode('react_product_page', 'render_product_page');
