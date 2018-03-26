<?php
/**
 * Displays custom About page sections
 *
 * @package Fuse_Engineering
 */

function fuse_eng_about_page_sections() {
	if ( function_exists( 'get_field' ) ) {
    if( have_rows( 'about_page_content_sections' ) ):

      while( have_rows('about_page_content_sections') ): the_row();
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

        if ( $top_places_to_work_section ) :

          while( have_rows('top_places_to_work_section') ): the_row();
            $bkg_image = get_sub_field('top_place_to_work_background_image');
            $content   = get_sub_field('top_place_to_work_content'); ?>

            <section class="about-top-place-to-work">
              <figure class="bkg-image">
                <img src="<?php echo esc_url( $bkg_image['url'] ); ?>" alt="<?php echo esc_attr( $bkg_image['alt'] ); ?>" description="<?php echo esc_attr( $bkg_image['description'] ); ?>">
              </figure>

              <div class="wrapper">
                <div class="content-wrapper">
                  <?php echo wp_kses_post( $content ); ?>
                </div>
              </div><!-- wrapper -->
            </section><!-- about-top-place-to-work -->

          <?php endwhile;

        endif;

      endwhile;

    endif;
	}
}