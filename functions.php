<?php
/**
 * Register Theme Scripts
 */
function ditto_scripts() {
  wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'ditto_scripts');

/**
 * Register Navigation Menus
 */
function ditto_navigation_menus() {
  $locations = array(
    'main_menu' => __( 'Main Menu', 'text_domain' )
  );
  register_nav_menus( $locations );
}
add_action( 'init', 'ditto_navigation_menus' );

/**
 * Theme support
 */
add_theme_support( 'custom-logo' );