<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fuse_Engineering
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
      <div class="wrapper">
        <div class="inner-wrapper">

          <div class="footer-logo">

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <svg xmlns="http://www.w3.org/2000/svg" width="235.35" height="117.46" viewBox="0 0 235.35 117.46"><defs><style>.footer-logo-a{fill:#3a3a3c;}</style></defs><title>fuse-gray-logo</title><polygon class="footer-logo-a" points="97.32 57.62 97.33 31.34 89.9 31.34 89.9 57.62 97.32 57.62"/><path class="footer-logo-a" d="M113.18,38.77h43.9V31.35h-43.9a11,11,0,0,0-11,11v8.06a10.94,10.94,0,0,0,10.88,11H144.7a3.6,3.6,0,0,1,3.54,3.53V73a3.61,3.61,0,0,1-3.54,3.54H100.85V84H144.7a11,11,0,0,0,11.06-10.94v-8.2a11,11,0,0,0-11-11H113.18a3.6,3.6,0,0,1-3.54-3.53v-8A3.6,3.6,0,0,1,113.18,38.77Z" transform="translate(0 0)"/><path class="footer-logo-a" d="M171.51,76.46A3.6,3.6,0,0,1,168,72.93V61.33h46.11v-19a11,11,0,0,0-11-11h-32a11.59,11.59,0,0,0-1.66.21h-.18l-.62.16-.18.05h0l-.19.06h-.1l-.71.26h0l-.14.06-.2.09c-.19.08-.36.17-.54.26h-.05l-.17.09h-.05a7.68,7.68,0,0,0-.78.47h0l-.32.23-.44.32-.16.14h0l-.13.1A10.88,10.88,0,0,1,168,41.89a3.59,3.59,0,0,1,3.48-3.11H203a3.54,3.54,0,0,1,3.53,3.53V53.9h-46v19a10.94,10.94,0,0,0,10.88,11h63.94V76.46Z" transform="translate(0 0)"/><path class="footer-logo-a" d="M157.08,31.34a11,11,0,0,1,11,11L168,53.9h-7.43l-.1-11.65a3.4,3.4,0,0,0-3.33-3.47h0V31.34Z" transform="translate(0 0)"/><path class="footer-logo-a" d="M89.89,73h0a3.62,3.62,0,0,1-3.61,3.45H58.42a3.61,3.61,0,0,1-3.53-3.53v-22H47.46v22a10.94,10.94,0,0,0,10.88,11H88l.41-.07.37-.08.47-.12.4-.12a1.7,1.7,0,0,0,.53-.19l.41-.15c.19-.08.39-.18.59-.28l.4-.19c.22-.12.44-.26.66-.4l.34-.22a10.63,10.63,0,0,0,1-.77v-.06A11,11,0,0,1,89.89,73Z" transform="translate(0 0)"/><path class="footer-logo-a" d="M44.81,24.64h-.89a8.85,8.85,0,0,1,.89.05Z" transform="translate(0 0)"/><path class="footer-logo-a" d="M44.29,32.11h-.37V24.64h-24V11a3.61,3.61,0,0,1,3.53-3.53H37.81V0H23.42a10.83,10.83,0,0,0-11,10.66h0v14H0v7.47H12.46v85.33H20l-.09-85.33Z" transform="translate(0 0)"/><path class="footer-logo-a" d="M43.92,24.64a10.94,10.94,0,0,1,11,10.88h0V50.91H47.45V35.6a3.61,3.61,0,0,0-3.53-3.53Z" transform="translate(0 0)"/><path class="footer-logo-a" d="M100.85,83.89A10.94,10.94,0,0,1,89.85,73h0V57.61h7.43V72.93a3.61,3.61,0,0,0,3.53,3.53v7.43Z" transform="translate(0 0)"/></svg>
            </a>
          </div>

          <div class="ftr-flex-wrapper">

            <?php if( function_exists( 'get_field' ) ) :
              $name    = get_field( 'company_name', 'global-information' );
              $address = get_field( 'address', 'global-information' );
              $city    = get_field( 'city', 'global-information' );
              $state   = get_field( 'state', 'global-information' );
              $zip     = get_field( 'zip', 'global-information' );
              $phone   = get_field( 'phone', 'global-information' );
              $fax     = get_field( 'fax', 'global-information' );
              $email   = get_field( 'email', 'global-information' );

              if( $name || $address || $city || $state || $zip || $phone || $fax || $email ) : ?>

                <div class="contact-information ftr-flex-child">
                  <div itemscope itemtype="http://schema.org/Organization">
                    <!-- <span itemprop="name" class="company-name"><?php echo esc_html( $name ); ?></span> -->
                    <!-- <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <span itemprop="streetAddress"><?php // echo esc_html( $address ); ?>, </span>
                        <span itemprop="addressLocality"><?php // echo esc_html( $city ); ?>, </span>
                        <span itemprop="addressRegion"><?php // echo esc_html( $state ); ?></span>
                        <span itemprop="postalCode"><?php // echo esc_html( $zip ); ?></span>
                    </div> -->

                    <?php if ( $phone ): ?>
                      <span class="footer-tel"><span itemprop="telephone"><a href="tel:<?php echo esc_html( $phone ); ?>"><?php echo esc_html( $phone ); ?></a> </span></span>
                    <?php endif; ?>

                      <!-- <span class="footer-fax">Fax: <span itemprop="faxNumber"><?php // echo esc_html( $fax ); ?></span></span> -->
                      <!-- <span class="email"><a href="mailto:<?php // echo esc_html( $email ); ?>" itemprop="email"><?php // echo esc_html( $email ); ?></a></span> -->
                  </div>
                </div>

              <?php endif ?>

            <?php endif; ?>

            <?php if( function_exists( 'get_field' ) ) :
              $fb   = get_field( 'facebook_url', 'social' );
              $pin  = get_field( 'pinterest_url', 'social' );
              $tw   = get_field( 'twitter_url', 'social' );
              $inst = get_field( 'instagram_url', 'social' );
              $yt   = get_field( 'youtube_url', 'social' );
              $goo  = get_field( 'google_plus_url', 'social' );
              $link = get_field( 'linkedin_url', 'social' );

              if( $fb || $pin || $tw || $insta || $yt || $goo || $link ) : ?>

              <div class="social ftr-flex-child">
                <ul class="social-media">

                  <? if ( $fb ): ?>
                    <li class="fb">
                      <a href="<?php echo wp_kses_post( $fb ); ?>" target="_blank">Find Us On Facebook</a>
                    </li>
                  <?php endif; ?>

                  <? if ( $link ): ?>
                    <li class="linked">
                      <a href="<?php echo wp_kses_post( $link ); ?>" target="_blank">Find Us On LinkedIn</a>
                    </li>
                  <?php endif; ?>

                  <? if ( $tw ): ?>
                    <li class="tw">
                      <a href="<?php echo wp_kses_post( $tw ); ?>" target="_blank">Follow Us On Twitter</a>
                    </li>
                  <?php endif; ?>

                  <? if ( $pin ): ?>
                    <li class="pin">
                      <a href="<?php echo wp_kses_post( $pin ); ?>" target="_blank">Find Us On Pinterest</a>
                    </li>
                  <?php endif; ?>

                  <? if ( $inst ): ?>
                    <li class="insta">
                      <a href="<?php echo wp_kses_post( $inst ); ?>" target="_blank">Find Us On Instagram</a>
                    </li>
                  <?php endif; ?>

                  <? if ( $yt ): ?>
                    <li class="yt">
                      <a href="<?php echo wp_kses_post( $yt ); ?>" target="_blank">Watch Us On YouTube</a>
                    </li>
                  <?php endif; ?>

                  <? if ( $goo ): ?>
                    <li class="goo">
                      <a href="<?php echo wp_kses_post( $goo ); ?>" target="_blank">Find Us On Google+</a>
                    </li>
                  <?php endif; ?>

                </ul>
              </div>

              <?php endif; ?>

            <?php endif; ?>

          </div><!-- .ftr-flex-wrapper -->

          <div class="divider">
            <span class="blue-bolt"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="53" viewBox="0 0 32 53"><title>lightening-bolt</title><image width="32" height="53" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAA1CAYAAAAgYencAAADh0lEQVRYhb3YW6hUVRzH8c+Z5qh1TI9WZFR08ygVQmiE3QxDu9HtoUPUMfQtsotlbxWUZJHVQ1IUiQ+V0eXZiCwqKoLCSiPsZoaRZIra3bTS08N/D54zZ2bPXnM5PxhmZq21/7/v7Fn7v/5rdXlnkxY0Fr3Zeyl7Pwp9GIcpOBv34fNaAcoJZjNwBiZhOo7A0TgFR6IbPZiYfa5oA36sF7QoQA9W45wEYNiPpdhTb0CpYKDZOCvRHNbgvbwBRQC6cAPGJJpvxQoMtgrQh3mJ5gexEt81GlgE4CqclAiwHs8WGdgIoAdXJpr/i/vxdzsAzsV5iQDPY13RwY0ABqRNvq14LGF8LsCpuCYlGJ7Ct+0CuE5kvaL6EM+lmOcB9OLGhDj7sRy72wUwV+T7onoJb6Sa1wMoi9s/rmCM7SLjNaVaAH2YkxDjcXzTLECt1fBqnFDw+vfVz3glHJa9xmAyJoisOlXUDb9WA0xEf0HzvXhGZMtjRU1wonhypmBa1jY+66/UDZW8cgCLqwEuwqyCAIO4HXdnJpMyo6JajlXVAAMJAXqkp+mK1uJhhk/CGbisyYAp+hp34Z9qgOvFJOmk9mAxtlQaKgCTcUWHzeEBvDu0oQIwF2d22Hy1WKyGqSRK6H7pNR/sy16N9BGWqVEflsUvv7Sg4Q/YhS+wET+Jx2lazjU7cAu21eosi8nXO6RtEH+ICbMJO/ExvhIzeB/+EomkHyfnmB8UM35jvQFlXIDPsBlf4ufsgu/Fr62n8bhD/l+3Ai/n9CvjTrF12pk3sIbm4/yc/rV4pFGQMj5NNCY2K7dl77W0Wdz63xsFKro1q9Y8sW7U0l4Bt6VOf8sA3bhVLLPVOoB78WbRYM0AzMbFdfrW4MmUYKkAXVgo1vVqrcc94i50DGCmqJiqtUMsMtsT4yUDDOCYqrb/sASfpJqnAkzFohrtT+DVZsxTARYauVN6TVbZNKuiZ0TH46Yh33fhaazCL6MBsMjwQ4pXxBlAyyryFxxn5D7xg3aYFwW4FqcP+f4iXh8tgAlY4NCis0HsA/4cLYDLHar9d4tkk7psNw1wuFh0iBp+qajt2qo8gEtwYfZ5JV5ot3keQEncbngbD3XCPA9gvjgj2Cby/G+jCdAtEs9Y3Cwq446pFsBMUW4v08bnPQVgCd7Co502Z+RaMAenic1KobPeVlV9B2bhQXHkOir6H62YlRrOQU/TAAAAAElFTkSuQmCC"/></svg></span>
            <hr>
          </div>
        </div>

      </div><!-- .wrapper -->
      <div class="copyright">
        <div class="fuse">&copy; 2018 Fuse Engineering</div>
        <div class="mm4"><a href="https://www.mm4solutions.com/" target="_blank" rel="noopener">Website by <img src="/wp-content/themes/fuse_eng/imgs/MMS_Logo_Black_Horizontal.png" alt="Millennium Marketing Solutions Logo"></a></div>
      </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

  <nav id="mobile-navigation">

    <?php
      wp_nav_menu( array(
        'theme_location' => 'mobile-menu',
        'menu_id' => 'mobile-menu',
        'container' => '',
      ) );
    ?>

  </nav>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
