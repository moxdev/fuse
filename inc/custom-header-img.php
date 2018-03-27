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

            <?php if( function_exists('get_field') ) {
              $header_sub_title = get_field( 'header_sub_title' );
              ?>
                <span class="header-sub-title"><?php echo wp_kses_post( $header_sub_title ); ?></span>
              <?php

            } ?>

            <span class="blue-bolt"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="53" viewBox="0 0 32 53"><title>lightening-bolt</title><image width="32" height="53" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAA1CAYAAAAgYencAAADh0lEQVRYhb3YW6hUVRzH8c+Z5qh1TI9WZFR08ygVQmiE3QxDu9HtoUPUMfQtsotlbxWUZJHVQ1IUiQ+V0eXZiCwqKoLCSiPsZoaRZIra3bTS08N/D54zZ2bPXnM5PxhmZq21/7/v7Fn7v/5rdXlnkxY0Fr3Zeyl7Pwp9GIcpOBv34fNaAcoJZjNwBiZhOo7A0TgFR6IbPZiYfa5oA36sF7QoQA9W45wEYNiPpdhTb0CpYKDZOCvRHNbgvbwBRQC6cAPGJJpvxQoMtgrQh3mJ5gexEt81GlgE4CqclAiwHs8WGdgIoAdXJpr/i/vxdzsAzsV5iQDPY13RwY0ABqRNvq14LGF8LsCpuCYlGJ7Ct+0CuE5kvaL6EM+lmOcB9OLGhDj7sRy72wUwV+T7onoJb6Sa1wMoi9s/rmCM7SLjNaVaAH2YkxDjcXzTLECt1fBqnFDw+vfVz3glHJa9xmAyJoisOlXUDb9WA0xEf0HzvXhGZMtjRU1wonhypmBa1jY+66/UDZW8cgCLqwEuwqyCAIO4HXdnJpMyo6JajlXVAAMJAXqkp+mK1uJhhk/CGbisyYAp+hp34Z9qgOvFJOmk9mAxtlQaKgCTcUWHzeEBvDu0oQIwF2d22Hy1WKyGqSRK6H7pNR/sy16N9BGWqVEflsUvv7Sg4Q/YhS+wET+Jx2lazjU7cAu21eosi8nXO6RtEH+ICbMJO/ExvhIzeB/+EomkHyfnmB8UM35jvQFlXIDPsBlf4ufsgu/Fr62n8bhD/l+3Ai/n9CvjTrF12pk3sIbm4/yc/rV4pFGQMj5NNCY2K7dl77W0Wdz63xsFKro1q9Y8sW7U0l4Bt6VOf8sA3bhVLLPVOoB78WbRYM0AzMbFdfrW4MmUYKkAXVgo1vVqrcc94i50DGCmqJiqtUMsMtsT4yUDDOCYqrb/sASfpJqnAkzFohrtT+DVZsxTARYauVN6TVbZNKuiZ0TH46Yh33fhaazCL6MBsMjwQ4pXxBlAyyryFxxn5D7xg3aYFwW4FqcP+f4iXh8tgAlY4NCis0HsA/4cLYDLHar9d4tkk7psNw1wuFh0iBp+qajt2qo8gEtwYfZ5JV5ot3keQEncbngbD3XCPA9gvjgj2Cby/G+jCdAtEs9Y3Cwq446pFsBMUW4v08bnPQVgCd7Co502Z+RaMAenic1KobPeVlV9B2bhQXHkOir6H62YlRrOQU/TAAAAAElFTkSuQmCC"/></svg></span>
          </div>

        </div><!-- title-wrapper -->
      </figure>
    </section>

    <?php
  }
}
