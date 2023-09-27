<?php

/**
 * Register taxonomies
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

function cptui_register_my_taxes_projects_type()
{
	/**
	 * Taxonomy: Tipos de proyectos.
	 */

	$labels = [
		"name" => esc_html__("Tipos de proyectos", "custom-post-type-ui"),
		"singular_name" => esc_html__("Tipo de proyecto", "custom-post-type-ui"),
		"menu_name" => esc_html__("Tipo de proyectos", "custom-post-type-ui"),
	];


	$args = [
		"label" => esc_html__("Tipos de proyectos", "custom-post-type-ui"),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => ['slug' => 'projects-type', 'with_front' => true,],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "projects-type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy("projects-type", ["proyectos"], $args);
}
add_action('init', 'cptui_register_my_taxes_projects_type');

function cptui_register_my_taxes_news_category()
{
	/**
	 * Taxonomy: Categorias.
	 */

	$labels = [
		"name" => esc_html__("Categorias noticias", "custom-post-type-ui"),
		"singular_name" => esc_html__("Categoria noticia", "custom-post-type-ui"),
		"menu_name" => esc_html__("Categorias noticias", "custom-post-type-ui"),
	];


	$args = [
		"label" => esc_html__("Categorias noticias", "custom-post-type-ui"),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => ['slug' => 'news-category', 'with_front' => true,],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "news-category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy("news-category", ["noticias"], $args);
}
add_action('init', 'cptui_register_my_taxes_news_category');
