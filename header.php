<?php

/**
 * 
 * Header.
 *
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$header_settings = get_field("header_settings", "options");
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
  <script>
    const _dittoURI_ = "<?= get_template_directory_uri() ?>",
      _dittoURL_ = "<?= get_site_url() ?>";
  </script>
</head>

<body <?php body_class(); ?>>
  <!-- Loader -->
  <?= get_template_part('partials/loader', 'loader', null) ?>
  <!-- Loader -->

  <!-- Sticky Header -->
  <?php if ($header_settings['enable_sticky_header']) : ?>
    <sticky-header data-scroll-y="<?= $header_settings['enable_sticky_header_on'] ?>"></sticky-header>
  <?php endif; ?>
  <!-- Sticky Header -->

  <div id="page" style="opacity: 0;"> <!-- +Page container -->
    <header id="header-wrapper">
      <div class="container">
        <nav class="navbar">
          <div class="logo">
            <?php if (has_custom_logo()) : ?>
              <?php the_custom_logo(); ?>
            <?php else : ?>
              <a rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>
            <?php endif ?>
          </div>

          <div class="nav_menu">
            <?php
            wp_nav_menu([
              'menu'            => 'main_menu',
              'theme_location'  => 'main_menu',
              'container'       => 'div',
              'menu_class'      => 'main-menu-list',
            ]);
            ?>
            <theme-toggle class="toggle_theme">
              <span data-toggle>Theme</span>
            </theme-toggle>
          </div>

          <div class="main-menu">
            <div class="hamburguer" onclick="ditto.menu(this)">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="aside-menu">
              <?php
              wp_nav_menu([
                'menu'            => 'main_menu',
                'theme_location'  => 'main_menu',
                'container'       => 'div',
                'menu_class'      => 'main-menu-list',
              ]);
              ?>
              <theme-toggle>
                <button type="button" data-toggle>Dark Theme</button>
              </theme-toggle>
            </div>
          </div>

        </nav>
      </div>
    </header>