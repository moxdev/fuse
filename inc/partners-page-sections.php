<?php
/**
 * Displays custom Partners page sections
 *
 * @package Fuse_Engineering
 */

function fuse_eng_partners_page_sections() {
	if ( function_exists( 'get_field' ) ) {
    if( have_rows('partners_logo_section') ): ?>

      <section class="partners">
        <div class="wrapper">

          <ul class="box-container">

          <?php while( have_rows('partners_logo_section') ): the_row();

            $lightbox_img        = get_sub_field('lightbox_img');
            $thumb_img           = get_sub_field('thumbnail_img');
            $partner_description = get_sub_field('partner_description');

            ?>

            <li class="box">

              <a href="<?php echo $lightbox_img['url']; ?>" class="glightbox">
                <img src="<?php echo $thumb_img['url']; ?>" alt="<?php echo $thumb_img['alt']; ?>" />
                <div class="glightbox-desc">
                    <?php echo wp_kses_post( $partner_description ); ?>
                </div>
              </a>

            </li>

          <?php endwhile; ?>

          </ul>

        </div>
      </section>

    <?php endif;
	}
}