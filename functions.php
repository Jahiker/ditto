<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
  exit;

// functions.php is empty so you can easily track what code is needed in order to Vite + Tailwind JIT run well

/**
 * Theme Includes
 */
$includes = array(
  '/wp-settings.php',      // Wordpress config.
  '/post-types.php',       // Register post types.
  '/taxonomies.php',       // Register taxonomies.
  '/endpoints.php',        // Register endpoints.
);

foreach ($includes as $file) {
  require_once __DIR__ . '/inc' . $file;
}
