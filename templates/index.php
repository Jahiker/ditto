<?php
/**
 * 
 * Default index.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="ditto-index">
	<?= get_template_part('partials/hero') ?>
	<?= get_template_part('partials/hero') ?>
</main>

<?php get_footer(); ?>