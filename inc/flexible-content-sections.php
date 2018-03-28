<?php
/**
 * Displays flexible sections
 *
 * @package Fuse_Engineering
 */

function fuse_eng_flexble_content_section() {
  if( function_exists('get_field') ) {

    if( have_rows('flexible_content') ):

      while ( have_rows('flexible_content') ) : the_row();

        if( get_row_layout() == 'gray_section' ):

          $gray_section_content = get_sub_field('gray_section_content'); ?>

            <section class="gray-section">
              <div class="wrapper">
                <?php echo wp_kses_post( $gray_section_content ); ?>
              </div>
            </section>

          <?php

        elseif( get_row_layout() == 'white_section' ):

          $white_section_content = get_sub_field('white_content_section'); ?>

            <section class="white-section">
              <div class="wrapper">
                <?php echo wp_kses_post( $white_section_content ); ?>
              </div>
            </section>

          <?php

        endif;

      endwhile;

    endif;
  }
}
