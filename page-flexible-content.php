<?php
/**
 * Template Name: Flexible Content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fuse_Engineering
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

      <?php if( function_exists( 'fuse_eng_flexble_content_section' ) ) : fuse_eng_flexble_content_section(); endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php

get_footer();
