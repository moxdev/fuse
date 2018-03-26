<?php
/**
 * Displays custom Partners page sections
 *
 * @package Fuse_Engineering
 */

function fuse_eng_partners_page_sections() {
	if ( function_exists( 'get_field' ) ) {

    $images = get_field('partners_gallery_images');

    if( $images ): ?>
      <section class="section pair">
        <div class="wrap">
          <ul class="box-container three-cols">
            <?php foreach( $images as $image ): ?>
              <li class="box">
                <a href="<?php echo $image['url']; ?>" class="glightbox">
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                  <div class="glightbox-desc">
                      <p><?php echo $image['caption']; ?></p>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>
    <?php endif;
	}
}