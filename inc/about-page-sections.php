<?php
/**
 * Displays custom About page sections
 *
 * @package Fuse_Engineering
 */

function fuse_eng_about_page_sections() {
	if ( function_exists( 'get_field' ) ) {
    if( have_rows( 'about_page_content_sections' ) ): ?>

      <?php while( have_rows('about_page_content_sections') ): the_row();
        $top_places_to_work_section = get_sub_field( 'top_places_to_work_section' );
        $learn_more_video_section   = get_sub_field( 'learn_more_video_section' );

        if ( $learn_more_video_section ) : ?>

        <section class="about-learn-more-video">
          <div class="wrapper">
            <div class="content-wrapper">
              <?php echo wp_kses_post( $learn_more_video_section ); ?>
            </div>
          </div><!-- wrapper -->
        </section><!-- about-learn-more-video -->

        <?php endif;

        if ( $top_places_to_work_section ) : ?>

        <section class="about-top-place-to-work">
          <div class="wrapper">
            <div class="content-wrapper">
              <?php echo wp_kses_post( $top_places_to_work_section ); ?>
            </div>
          </div><!-- wrapper -->
        </section><!-- about-top-place-to-work -->

        <?php endif;


      endwhile;

    endif;
	}
}