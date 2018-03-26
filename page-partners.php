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
		<main id="main" class="site-main">
      <div class="wrapper">
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
      </div>
    </main><!-- #main -->

    <?php if( function_exists( 'fuse_eng_partners_page_sections' ) ) : fuse_eng_partners_page_sections(); endif; ?>

  </div><!-- #primary -->


<?php
// get_sidebar();
get_footer();
