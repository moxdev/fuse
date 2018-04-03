<?php
/**
 * Template Name: Partners Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fuse_Engineering
 */

get_header();
?>

	<div id="primary" class="content-area">

    <?php if( function_exists( 'fuse_eng_partners_page_sections' ) ) : fuse_eng_partners_page_sections(); endif; ?>

  </div><!-- #primary -->


<?php

get_footer();
