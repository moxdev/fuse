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

        if ( $top_places_to_work_section ) : ?>

        <section class="home-top-place-to-work">
          <div class="wrapper">
            <div class="content-wrapper">
              <?php echo wp_kses_post( $top_places_to_work_section ); ?>
            </div>
          </div><!-- wrapper -->
        </section><!-- home-top-place-to-work -->

        <?php endif;

        if ( $testimonial_section ) :

          if( have_rows('testimonial_section') ):

            while( have_rows('testimonial_section') ): the_row();

            $testimonial        = get_posts( array('post_type' => 'testimonials', 'posts_per_page' => -1) );
            $testimonial_header = get_sub_field( 'testimonial_header' );
            $testimonial_button = get_sub_field( 'testimonial_button' ); ?>

            <div class="home-testimonial-section">
              <div class="wrapper">
                <div class="content-wrapper">
                  <h2><?php echo wp_kses_post( $testimonial_header ); ?></h2>

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

                        <div class="home-testimonial">
                          <div class="home-testimonial-wrapper">
                            <div class="testimonial-carousel">

                            <?php while ( $testimonials->have_posts() ) {
                                $testimonials->the_post();
                                $excerpt = get_field( 'testimonial_excerpt', $post->ID );

                                ?>

                                <div class="cell">
                                  <div class="cell-wrapper">

                                    <div class="testimonial-content-wrapper">
                                      <?php the_content(); ?>
                                      <span class="title">&mdash; &nbsp; <?php the_title(); ?></span>
                                    </div>

                                  </div>
                                </div><!-- cell -->

                              <?php

                            } ?>

                            </div><!-- testimonial-carousel -->
                          </div><!-- home-testimonial-wrapper -->
                        </div>

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

                </div><!-- content-wrapper -->
              </div><!-- wrapper -->
            </div><!-- home-testimonial-section -->

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