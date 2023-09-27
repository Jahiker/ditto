<?php

/**
 * Register post types
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

function cptui_register_my_cpts_projects()
{
	/**
	 * Post Type: Proyectos.
	 */

	$labels = [
		"name" => esc_html__("Proyectos", "custom-post-type-ui"),
		"singular_name" => esc_html__("Proyecto", "custom-post-type-ui"),
		"menu_name" => esc_html__("Proyectos", "custom-post-type-ui"),
		"all_items" => esc_html__("Todos los proyectos", "custom-post-type-ui"),
	];

	$args = [
		"label" => esc_html__("Proyectos", "custom-post-type-ui"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => ["slug" => "proyectos", "with_front" => true],
		"query_var" => true,
		"menu_icon" => "dashicons-building",
		"supports" => ["title"],
		"taxonomies" => ["projects-type"],
		"show_in_graphql" => true,
	];

	register_post_type("proyectos", $args);
}
add_action('init', 'cptui_register_my_cpts_projects');

function cptui_register_my_cpts_news()
{
	/**
	 * Post Type: Noticias.
	 */

	$labels = [
		"name" => esc_html__("Noticias", "custom-post-type-ui"),
		"singular_name" => esc_html__("Noticia", "custom-post-type-ui"),
		"menu_name" => esc_html__("Noticias", "custom-post-type-ui"),
		"all_items" => esc_html__("Todas las noticias", "custom-post-type-ui"),
	];

	$args = [
		"label" => esc_html__("Noticias", "custom-post-type-ui"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => ["slug" => "noticias", "with_front" => true],
		"query_var" => true,
		"menu_icon" => "dashicons-media-document",
		"supports" => ["title"],
		"taxonomies" => ["news-category"],
		"show_in_graphql" => true,
	];

	register_post_type("noticias", $args);
}
add_action('init', 'cptui_register_my_cpts_news');

function cptui_register_my_cpts_services()
{
	/**
	 * Post Type: Servicios.
	 */

	$labels = [
		"name" => esc_html__("Servicios", "custom-post-type-ui"),
		"singular_name" => esc_html__("Servicio", "custom-post-type-ui"),
		"menu_name" => esc_html__("Servicios", "custom-post-type-ui"),
		"all_items" => esc_html__("Todos los servicios", "custom-post-type-ui"),
	];

	$args = [
		"label" => esc_html__("Servicios", "custom-post-type-ui"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => ["slug" => "servicios", "with_front" => true],
		"query_var" => true,
		"menu_icon" => "dashicons-hammer",
		"supports" => ["title"],
		"taxonomies" => [],
		"show_in_graphql" => true,
	];

	register_post_type("servicios", $args);
}
add_action('init', 'cptui_register_my_cpts_services');
