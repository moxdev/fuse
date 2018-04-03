<?php
/**
 * Displays custom homepage sections
 *
 * @package Fuse_Engineering
 */

function fuse_eng_home_page_sections() {
	if ( function_exists( 'get_field' ) ) {
    if( have_rows( 'home_page_content_sections' ) ): ?>

      <?php while( have_rows('home_page_content_sections') ): the_row();
        $top_places_to_work_section = get_sub_field( 'top_places_to_work_section' );
        $testimonial_section        = get_sub_field( 'testimonial_section' );
        $learn_more_video_section   = get_sub_field( 'learn_more_video_section' );

        if ( $top_places_to_work_section ) :

          while( have_rows('top_places_to_work_section') ): the_row();
            $tpw_bkg_image = get_sub_field('home_top_place_to_work_background_image');
            $tpw_content   = get_sub_field('home_top_place_to_work_content'); ?>

            <section class="home-top-place-to-work">
              <figure class="bkg-image">
                <img src="<?php echo esc_url( $tpw_bkg_image['url'] ); ?>" alt="<?php echo esc_attr( $tpw_bkg_image['alt'] ); ?>" description="<?php echo esc_attr( $tpw_bkg_image['description'] ); ?>">
              </figure>

              <div class="wrapper">
                <div class="content-wrapper">
                  <?php echo wp_kses_post( $tpw_content ); ?>
                </div>
              </div><!-- wrapper -->
            </section><!-- home-top-place-to-work -->

          <?php endwhile;

        endif;

        if ( $testimonial_section ) :

          if( have_rows('testimonial_section') ):

            while( have_rows('testimonial_section') ): the_row();

            $testimonial        = get_posts( array('post_type' => 'testimonials', 'posts_per_page' => -1) );
            $testimonial_header = get_sub_field( 'testimonial_header' );
            $testimonial_button = get_sub_field( 'testimonial_button' ); ?>

            <section class="home-testimonial">
              <div class="wrapper">
                <div class="inner-wrapper">

                  <h2><?php echo wp_kses_post( $testimonial_header ); ?></h2>
                  <div class="divider">
                    <span class="quote">"</span>
                    <hr>
                  </div>


                  <?php if ($testimonial) {
                      // WP_Query arguments
                      $args = array(
                          'post_type'   => array( 'testimonials' ),
                          'post_status' => array( 'publish' ),
                          'nopaging'    => true,
                          'order'       => 'DESC',
                          'orderby'     => 'date',
                      );
                      // The Query
                      $testimonials = new WP_Query( $args );
                      // The Loop
                      if ( $testimonials->have_posts() ) { ?>

                        <div class="testimonial">
                          <div class="testimonial-carousel">

                          <?php while ( $testimonials->have_posts() ) {
                              $testimonials->the_post();

                              ?>

                              <div class="cell">
                                <div class="cell-wrapper">
                                  <?php the_content(); ?>
                                  <span class="title">&mdash; &nbsp; <?php the_title(); ?></span>
                                </div>
                              </div><!-- cell -->

                            <?php

                          } ?>

                          </div><!-- testimonial-carousel -->
                        </div><!-- testimonial -->

                      <?php
                      }
                      // Restore original Post Data
                      wp_reset_postdata();
                  } ?>

                  <?php if ( $testimonial_button ) : ?>

                    <div class="button-wrapper">
                      <?php echo wp_kses_post( $testimonial_button ); ?>
                    </div>

                  <?php endif; ?>

                </div>
              </div><!-- wrapper -->
            </section><!-- home-testimonial -->

            <?php endwhile;

          endif;

        endif;

        if ( $learn_more_video_section ) : ?>

          <section class="home-learn-more-video">
            <div class="wrapper">
              <div class="content-wrapper">
                <?php echo wp_kses_post( $learn_more_video_section ); ?>
              </div>
            </div><!-- wrapper -->
          </section><!-- home-learn-more-video -->

        <?php endif;

      endwhile;

    endif;
	}
}