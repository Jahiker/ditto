<?php

/**
 * Register endpoints
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

add_action('rest_api_init', function () {
    // Search
    register_rest_route('router', '/search', array(
        array(
            'methods'               => WP_REST_Server::READABLE,
            'callback'              => 'router_search_handler',
            'permission_callback'   => '__return_true',
        )
    ));

    // Projects
    register_rest_route('cpt', '/projects', array(
        array(
            'methods'               => WP_REST_Server::READABLE,
            'callback'              => 'cpt_projects_handler',
            'permission_callback'   => '__return_true',
        )
    ));

    // Services
    register_rest_route('cpt', '/servicios', array(
        array(
            'methods'               => WP_REST_Server::READABLE,
            'callback'              => 'cpt_services_handler',
            'permission_callback'   => '__return_true',
        )
    ));

    // News
    register_rest_route('cpt', '/news', array(
        array(
            'methods'               => WP_REST_Server::READABLE,
            'callback'              => 'cpt_news_handler',
            'permission_callback'   => '__return_true',
        )
    ));

    register_rest_route('breadcrumb', '/(?P<id>\d+)', array(
        array(
            'methods'               => WP_REST_Server::READABLE,
            'callback'              => 'handler_breadcrumb',
            'permission_callback'   => '__return_true',
        )
    ));
});

function router_search_handler($data)
{
    $args = array(
        'post_status' => 'publish',
        's' => $data['s'],
        'post_per_page' => -1
    );

    if ($data['post_type']) {
        $args['post_type'] = [$data['post_type']];
    }

    $result = new WP_Query($args);

    $res_search = array();

    if ($data['s']) {
        while ($result->have_posts()) {
            $result->the_post();

            $content = get_field('content');

            array_push($res_search, array(
                'id' => get_the_ID(),
                'post_title' => htmlspecialchars_decode(get_the_title()),
                'permalink' => get_the_permalink(),
                'post' => get_post(),
                'content' => $content
            ));
        }
        wp_reset_postdata();
    }

    return $res_search;
}

function cpt_projects_handler($data)
{

    $args = array(
        'post_type' => 'proyectos',
        'post_status' => 'publish',
        'nopaging' => $data['nopaging'] === 'true' ? false : true,
        'posts_per_page' => $data['posts_per_page'] ? intval($data['posts_per_page']) : -1,
        'paged' => $data['paged'] ? intval($data['paged']) : 1,
        'order' => 'ASC',
    );

    if ($data['tax'] && $data['tax'] !== 'null') {
        $args['tax_query'] = array(array(
            'taxonomy' => 'projects-type',
            'field' => 'term_id',
            'terms' => array(intval($data['tax']))
        ));
    }

    $result = new WP_Query($args);

    $response = new stdClass();
    $projects_list = array();
    $taxonomies = get_term_by('id', intval($data['tax']), 'projects-type');

    $taxonomies_list = get_terms(array(
        'taxonomy'   => 'projects-type',
        'hide_empty' => false,
    ));

    foreach ($taxonomies_list as $key => $tax) {
        $tax->name = htmlspecialchars_decode($tax->name);
    }

    while ($result->have_posts()) {
        $result->the_post();

        array_push($projects_list, array(
            'id' => get_the_ID(),
            'post_title' => html_entity_decode(get_the_title(), ENT_QUOTES, 'UTF-8'),
            'permalink' => get_the_permalink(),
            'content' => get_field('content'),
            'taxonomies' => get_the_terms($result->id, 'projects-type')
        ));
    }
    wp_reset_postdata();

    $response->posts = $projects_list;
    $response->taxonomies = $taxonomies;
    $response->taxonomies_list = $taxonomies_list;
    $response->totalItems = $result->found_posts;
    $response->totalPages = $result->max_num_pages;
    $response->args = $args;

    return $response;
}

function cpt_services_handler($data)
{

    $args = array(
        'post_type' => 'servicios',
        'post_status' => 'publish',
        'post_per_page' => -1,
        'order' => 'ASC',
    );

    $result = new WP_Query($args);

    $response = new stdClass();
    $sectors_list = array();

    while ($result->have_posts()) {
        $result->the_post();

        array_push($sectors_list, array(
            'id' => get_the_ID(),
            'post_title' => htmlspecialchars_decode(get_the_title()),
            'permalink' => get_the_permalink(),
            'content' => get_field('content'),
            'taxonomies' => get_the_terms($result->id, 'projects-type')
        ));
    }
    wp_reset_postdata();

    $response->posts = $sectors_list;

    return $response;
}

function cpt_news_handler($data)
{
    $args = array(
        'post_type' => 'noticias',
        'post_status' => 'publish',
        'post_per_page' => -1,
        'order' => 'ASC',
        'nopaging' => $data['nopaging'] === 'true' ? false : true,
        'posts_per_page' => $data['posts_per_page'] ? intval($data['posts_per_page']) : -1,
        'paged' => $data['paged'] ? intval($data['paged']) : 1,
    );

    if ($data['tax'] && $data['tax'] !== 'null') {
        $args['tax_query'] = array(array(
            'taxonomy' => 'news-category',
            'field' => 'term_id',
            'terms' => array(intval($data['tax']))
        ));
    }

    $result = new WP_Query($args);

    $response = new stdClass();
    $news_list = array();
    $taxonomies = get_term_by('id', intval($data['tax']), 'news-category');
    $taxonomies_list = get_terms(array(
        'taxonomy'   => 'news-category',
        'hide_empty' => false,
    ));

    while ($result->have_posts()) {
        $result->the_post();

        array_push($news_list, array(
            'id' => get_the_ID(),
            'post_title' => htmlspecialchars_decode(get_the_title()),
            'permalink' => get_the_permalink(),
            'content' => get_field('content'),
            'taxonomies' => get_the_terms($result->id, 'news-category'),
            'date' => get_the_date('j.m.y')
        ));
    }
    wp_reset_postdata();

    $response->posts = $news_list;
    $response->taxonomies = $taxonomies;
    $response->taxonomies_list = $taxonomies_list;
    $response->totalItems = $result->found_posts;
    $response->totalPages = $result->max_num_pages;
    $response->args = $args;

    return $response;
}

function handler_breadcrumb($request)
{
    $params = $request->get_params();

    $page = get_posts([
        'p'                 => $params['id'],
        'post_type'         => ['page', 'proyectos', 'noticias', 'sectores', 'servicios', 'empleos'],
        'post_status'       => 'publish',
    ]);

    $output = [];

    if ($page) :
        $output[] = [
            "name" => "Home",
            "path" => "/" . $params['lang'] . "/"
        ];
        if ($page[0]->post_type != 'page') :
            $output[] = [
                "name" => ucfirst($page[0]->post_type),
                "path" => "/" . $params['lang'] . "/" . $page[0]->post_type
            ];
            $output[] = [
                "name" => get_the_title($page[0]->ID),
                "path" => "/" . $params['lang'] . "/" . $page[0]->post_type . "/" . $page[0]->post_name
            ];
        else :
            $output[] = [
                "name" => get_the_title($page[0]->ID),
                "path" => "/" . $params['lang'] . "/" . $page[0]->post_name
            ];
        endif;
    endif;

    return $output;
}
