<?php
/**
 * Template Name: Contact Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fuse_Engineering
 */

get_header();
?>

	<div id="primary" class="content-area">
    <div class="wrapper">
		  <main id="main" class="site-main">
        <?php
        while ( have_posts() ) :
          the_post();

          get_template_part( 'template-parts/content', 'page' );

          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;

        endwhile; // End of the loop.
        ?>
      <?php if( function_exists( 'mm4_you_contact_form' ) ) : mm4_you_contact_form(); endif; ?>


      </main><!-- #main -->

      <?php get_sidebar(contact); ?>

    </div>

  </div><!-- #primary -->

<?php

get_footer();
