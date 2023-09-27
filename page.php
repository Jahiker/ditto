<?php

/**
 * 
 * Default page.
 *
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="ditto-page">
	<section>
		<div class="container">
			<?= get_template_part('partials/hero') ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>