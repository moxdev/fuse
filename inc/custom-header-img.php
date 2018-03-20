<?php
/**
 * Custom function for Custom Header Image
 *
 * @package Fuse_Engineering
 */

function fuse_eng_custom_header_section() {
  if( is_front_page() && has_post_thumbnail() ) { ?>

    <section class="hero">

      <?php the_post_thumbnail('home-feature'); ?>

      <?php if ( function_exists( 'get_field' ) ) :
        $hero_title    = get_field( 'home_hero_title' );
        $hero_content  = get_field( 'home_hero_content' ); ?>

        <div class="title-wrapper">
          <span class="hero-title"><?php echo wp_kses_post( $hero_title ); ?></span>
          <span class="hero-icon-divider"></span>
          <span class="hero-content"><?php echo wp_kses_post( $hero_content ); ?></span>
        </div>

      <?php endif; ?>

    </section>

    <?php

  } elseif ( is_home() || is_archive() || is_single() ) {
    $news_feature_img = get_the_post_thumbnail( get_option( 'page_for_posts' ), 'feature-img' ); ?>

    <section class="hero">
      <figure class="feature-img">
        <?php echo $news_feature_img; ?>
      </figure>
    </section>

    <?php

  } elseif ( is_page() && has_post_thumbnail() ) { ?>

    <section class="hero">
      <figure class="feature-img">
        <?php the_post_thumbnail('feature-img'); ?>
      </figure>
    </section>

    <?php
  }
}
