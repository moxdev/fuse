<?php
/**
 * The sidebar for the Contact Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fuse_Engineering
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
  <div class="sidebar-wrapper">

    <?php if( is_page_template( 'page-contact.php' ) && function_exists( 'fuse_eng_contact_page_sidebar' ) ) {
      fuse_eng_contact_page_sidebar();
    } ?>

  </div>
</aside><!-- #secondary -->
