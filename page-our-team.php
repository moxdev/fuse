<?php
/**
 * Template Name: Our Team Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fuse_Engineering
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <div class="wrapper">

        <?php if( function_exists( 'fuse_eng_our_team_page_sections' ) ) : fuse_eng_our_team_page_sections(); endif; ?>

      </div>
    </main><!-- #main -->

  </div><!-- #primary -->

<?php

get_footer();
