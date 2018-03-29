<?php
/**
 * Displays custom Contact Page sidebar
 *
 * @package Fuse_Engineering
 */

function fuse_eng_contact_page_sidebar() {
	if ( function_exists( 'get_field' ) ) {
   $add    = get_field('address', 'global-information');
   $city   = get_field('city', 'global-information');
   $state  = get_field('state', 'global-information');
   $zip    = get_field('zip', 'global-information');
   $ph     = get_field('phone', 'global-information');
   $fx     = get_field('fax', 'global-information');
   $email  = get_field('email', 'global-information');

  if( $add || $city || $state || $zip ) {
    ?>
    <div id="address">
      <h2>Our Office</h2>

      <?php

      if( $add ): ?>
        <span class="side-address"><?php echo esc_html( $add ); ?></span>
      <?php endif;

      if( $city || $state || $zip ): ?>

        <span><?php echo esc_html( $city ); ?>, </span>
        <span><?php echo esc_html( $state ); ?></span>
        <span><?php echo esc_html( $zip ); ?></span>

      <?php endif;

      ?>

    </div>

    <?php
  }

  if( $ph || $fx ) { ?>

     <div id="phone-fax">

       <?php

       if($ph): ?>
         <span class="side-phone"><a href="tel:<?php echo esc_html( $ph ); ?>" class="tel"><?php echo esc_html( $ph ); ?> Phone</a></span>
       <?php endif;

       if($fx): ?>
         <span class="side-fax"><?php echo esc_html( $fx ); ?> Fax</span>
       <?php endif;

       ?>

     </div>

     <?php
  }

  if( $add || $city || $state || $zip ) {
    ?>
    <div id="directions">

      <?php if ( function_exists( 'fuse_eng_directions_map' ) ) {
        fuse_eng_directions_map();
      }  ?>

    </div>

    <?php
  }
 }
}

function fuse_eng_directions_map() {
  if( function_exists( 'get_field' ) ) {
    $lat = get_field('latitude', 'global-information');
    $lng = get_field('longitude', 'global-information');

    if($lat && $lng) { ?>
      <div id="map-canvas"></div>
      <form id="get-directions">
        <label>Starting Address: <input id="start" type="text"></label>
        <input id="end" value="<?php echo $lat; ?>, <?php echo $lng; ?>" type="hidden">
        <div id="response-panel"></div>
        <input class="directions-submit-button" value="Get Directions" type="submit">
      </form>

      <?php wp_enqueue_script( 'fuse-eng-directions', get_template_directory_uri() . '/js/min/directions-map.min.js', array(), NULL, TRUE );
    }
  }
}