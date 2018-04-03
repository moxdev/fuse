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
          <div class="hero-divider">
            <span class="blue-bolt">
              <svg xmlns="http://www.w3.org/2000/svg" width="46.61" height="78.51" viewBox="0 0 46.61 78.51"><defs><style>.a{fill:#00bed5;fill-rule:evenodd;}</style></defs><title>lightening-bolt</title><polygon class="a" points="37.01 0 15.42 2.13 0 40.56 23.94 36.09 4.18 78.51 46.61 23.48 21.35 26.33 37.01 0"/></svg>
            </span>
            <hr>
          </div>
          <span class="hero-content"><?php echo wp_kses_post( $hero_content ); ?></span>
        </div>

      <?php endif; ?>

    </section>

    <?php

  } elseif ( is_home() || is_archive() || is_single() ) {
    $news_feature_img = get_the_post_thumbnail( get_option( 'page_for_posts' ), 'feature-img' );
    $news_page_title  = get_the_title( get_option('page_for_posts', true) );

    if( function_exists('get_field') ) {
      $header_sub_title = get_field( 'header_sub_title' );

      if ( $header_sub_title ) { ?>

        <section class="expanded-header">
          <figure class="feature-img">

            <?php echo $news_feature_img; ?>

            <div class="title-wrapper">

              <div class="inner-wrapper">

                <span class="header-title"><?php fuse_eng_seo_blog_page_title(); ?></span>

                <span class="header-sub-title"><?php echo wp_kses_post( $header_sub_title ); ?></span>

                <span class="blue-bolt">
                  <svg xmlns="http://www.w3.org/2000/svg" width="46.61" height="78.51" viewBox="0 0 46.61 78.51"><defs><style>.a{fill:#00bed5;fill-rule:evenodd;}</style></defs><title>lightening-bolt</title><polygon class="a" points="37.01 0 15.42 2.13 0 40.56 23.94 36.09 4.18 78.51 46.61 23.48 21.35 26.33 37.01 0"/></svg>
                </span>
              </div>

            </div><!-- title-wrapper -->
          </figure>
        </section>

      <?php

      } else { ?>

        <section class="default-header">
          <figure class="feature-img">

            <?php echo $news_feature_img; ?>

            <div class="title-wrapper">

              <div class="inner-wrapper">

                <span class="header-title"><?php fuse_eng_seo_blog_page_title(); ?></span>

                <span class="blue-bolt">
                  <svg xmlns="http://www.w3.org/2000/svg" width="46.61" height="78.51" viewBox="0 0 46.61 78.51"><defs><style>.a{fill:#00bed5;fill-rule:evenodd;}</style></defs><title>lightening-bolt</title><polygon class="a" points="37.01 0 15.42 2.13 0 40.56 23.94 36.09 4.18 78.51 46.61 23.48 21.35 26.33 37.01 0"/></svg>
                </span>
              </div>

            </div><!-- title-wrapper -->
          </figure>
        </section>

      <?php
      }
    }

  } elseif ( is_page() && has_post_thumbnail() ) {

    if( function_exists('get_field') ) {
      $header_sub_title = get_field( 'header_sub_title' );

      if ( $header_sub_title ) { ?>

        <section class="expanded-header">
          <figure class="feature-img">

            <?php the_post_thumbnail('feature-img'); ?>

            <div class="title-wrapper">

              <div class="inner-wrapper">

                <?php if( is_page_template( 'page-services-child.php' ) ) { ?>
                  <span class="header-title"><h2>Our Services</h2></span>
                <?php } else { ?>
                  <span class="header-title"><?php fuse_eng_seo_page_titles(); ?></span>
                <?php } ?>

                <span class="header-sub-title"><?php echo wp_kses_post( $header_sub_title ); ?></span>

                <span class="blue-bolt">
                  <svg xmlns="http://www.w3.org/2000/svg" width="46.61" height="78.51" viewBox="0 0 46.61 78.51"><defs><style>.a{fill:#00bed5;fill-rule:evenodd;}</style></defs><title>lightening-bolt</title><polygon class="a" points="37.01 0 15.42 2.13 0 40.56 23.94 36.09 4.18 78.51 46.61 23.48 21.35 26.33 37.01 0"/></svg>
                </span>
              </div>

            </div><!-- title-wrapper -->
          </figure>
        </section>

      <?php

      } else { ?>

        <section class="default-header">
          <figure class="feature-img">

            <?php the_post_thumbnail('feature-img'); ?>

            <div class="title-wrapper">

              <div class="inner-wrapper">

                <?php if( is_page_template( 'page-services-child.php' ) ) { ?>
                  <span class="header-title"><h2>Our Services</h2></span>
                <?php } else { ?>
                  <span class="header-title"><?php fuse_eng_seo_page_titles(); ?></span>
                <?php } ?>

                <span class="blue-bolt">
                  <svg xmlns="http://www.w3.org/2000/svg" width="46.61" height="78.51" viewBox="0 0 46.61 78.51"><defs><style>.a{fill:#00bed5;fill-rule:evenodd;}</style></defs><title>lightening-bolt</title><polygon class="a" points="37.01 0 15.42 2.13 0 40.56 23.94 36.09 4.18 78.51 46.61 23.48 21.35 26.33 37.01 0"/></svg>
                </span>
              </div>

            </div><!-- title-wrapper -->
          </figure>
        </section>

      <?php
      }
    }
  } else {
    $feature_img = get_the_post_thumbnail( get_option( 'page_for_posts' ), 'feature-img' );
    ?>
      <section class="default-header">
        <figure class="feature-img">

          <?php echo $feature_img; ?>

          <div class="title-wrapper">

            <div class="inner-wrapper">

              <span class="blue-bolt">
                <svg xmlns="http://www.w3.org/2000/svg" width="46.61" height="78.51" viewBox="0 0 46.61 78.51"><defs><style>.a{fill:#00bed5;fill-rule:evenodd;}</style></defs><title>lightening-bolt</title><polygon class="a" points="37.01 0 15.42 2.13 0 40.56 23.94 36.09 4.18 78.51 46.61 23.48 21.35 26.33 37.01 0"/></svg>
              </span>
            </div>

          </div><!-- title-wrapper -->
        </figure>
      </section>
    <?php
  }
}