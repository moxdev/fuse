<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fuse_Engineering
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fuse_eng' ); ?></a>

	<header id="masthead" class="site-header">
    <div class="header-wrapper">

      <nav id="left-side-navigation" class="flex-child">

        <?php
          wp_nav_menu( array(
            'theme_location' => 'left-main-menu',
            'menu_id'        => 'left-main-menu',
          ) );
        ?>
      </nav><!-- #left-side-navigation -->

      <div class="site-branding flex-child">
        <?php
        if ( is_front_page() && is_home() ) :
          ?>
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php
        else :
          ?>
          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
          <?php
        endif;
        $fuse_eng_description = get_bloginfo( 'description', 'display' );
        if ( $fuse_eng_description || is_customize_preview() ) :
          ?>
          <p class="site-description"><?php echo $fuse_eng_description; /* WPCS: xss ok. */ ?></p>
        <?php endif; ?>

        <div class="header-logo">
          <a href="<?php echo get_home_url(); ?>" rel="home">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="125" height="63" viewBox="0 0 125 63"><title>fuse-engineering-logo</title><image width="125" height="63" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAH0AAAA/CAYAAADNEMdCAAAJUElEQVR4nO2cfWwcRxmHn9ndu7Od2I4TO7bz4XzZKWpEWqpCG6q2NGmjNqhqVcRXg6CCQkBQpTQiAgUkKH9ENIQERKEklAqhBlQIKW0JhQKCEtpKleUmDa0i3MTESWzHSXz1x/nOd7fDH3OO99bny65v93zJ7SOtkpndm5md38zszLzvWEgpccAdwGeA24DaPM8NArcAnU4SvdLY+NZp9vVEQROQMnn1hhXcWFM508WahOHgmW9lrpDDNLXpFyegGFxK9AeAR12mKaZXlIBikU/0GuDrOeLfBVJMFldY7gWUMPlEXw1cZQmPAg8C/wbMHM+LTHyvZ6UL8IV8oi+3hf8A7JtOJv+IjvD6QAx0h5970+TWubP5QAlOgq4E8okesYX73SZ+Lpnm/v+c4tXBGMOjSRAOP/fJNN9ZtSgQ3SfyiW5fy+luE9907Awv9UYhbKjLBZVaMB/0C1+XVxLUkO60hwcUBV9FD6QuTYKNlDIkEL0MySd60hYONl2uEAzgEFDF5A2Xelv4k8BNLtIWQBroAp5DrfOHplXKAE8xgDU4G+YbMpdjMmu+9wMfBV4BNgFH3aQR4D0aEC9SXh8E9gMLi5RfwBQYQDG3vVYCW4HNHqXXAFyDarwGcBo4wuSNJYBmYAU+vq9QHWgYeBNIWZasizJ5R6YomxtGgXeAnukmYADrM/9aCyOBu4CHLXEvAD92l7wQwOeB+yyR96Ls84OuSzuZG4DfosqvA78DPkH2uzQC30C952Imby97hYyZ8gRQB/wX2K0L8QqwDViXyTtM4aLHgW7gJWA70Oc2AQP46xT37N/vTuDPbhIPq63UI8AqJix2tahW3+EmrSnQgQprlrb7rahGca0HeV2SpJQhYD4wH8GaJ89Ej1+3sqnV4x3lEHB15lqLmi8dc5NAvgmcfRi0V2he2ofivHZhGDTtHKpljhNC2eq9QKJWCONY/x8CfkaRBM8wUUe6pj3RfW7Z3p6B8z7m917gcaDazY/cWUEc8uZwgts7uogm06AJjdwOF35zF6onWDkOnPMpf9MQ9AJzUUtgAP2Hpy6k762vHm0MG70oS2UheUvUSLLUErcOuB044DQRz0XvGIqzoaOL6FjKuf3cHzbYwn9CzS9O+5XhLE0DNafYA1Sja7w9FJ/9Vmzs+cawsQU45UE2LcBTZDfotbgQ3VNVjsYSrHuji96ZFxyyewPAE/goOIChrIm/QY0oCtOsigiewhvBAU4CP7HFLcXFCOKZMkeGE6xv72IgURKCQ/YED2DM7wz/F7+4c524GKkJftETTe840W+9XygjtnAYF6J7Mrx3J5Ks7+iiL5EsFcFh8tLI14I9eqKfl88Pjb//hACaxpPdFzRMk11nBjh24wqqddf+KHbs7+JqGeiJ6DFT0hdPguGoXh21yEIXs8XCBLZ09rL7eD8YF8XM7tKGBiloqQihlYCXgSeiq7YtcislACnTyExFCAfDrLNTN25JX/oR9wigQtMAaW3OiayHkqnUuvoafr+6hVklMBJ6InpjyGDvqgXoOVqxEOiDKfN8LG32CEFKR8RrDS2dT9YxU3LznKo8TzjCbtFrKjTBXAjgs81z2HdmgJOJ1Lhr2ERVmCYfaqhJHrxmyfhmlRcUZOb2RPQaQ+PB5rqpbqdRFd6SCSeYhpPlNHgbuNsS3gZEM/GF1L5A7a+fIWOObqsMc/+COh470c8sQ0NCNCXlAJCKm0LfvqJxYVgTy3F+NCwfaSavTFzhy+ZMDqy2eq+HWWsDso6dzwBbLPfbUFa+YQrfnEmjDB6/BPYCA9uW1LN50Vx0lXKVlFQDZhrEPEPfk/mNF11dUmDjKZborumKJ+kdSxHO70mbHjXNbgmahFCFEFFdCG1hxDAbw0Y7aj37kOV5nfynbt1QB3wPZUD6+Gxd65498b0OkV23XvRwzyhZ0f94fogtx3qoDOUtopaWshbQJWi6oEKkpfxYcy27Wpuo0rWtwCzUMWu/PilrUI3rPiZm7cVefLiyi5Ss6F9eOJfO0TF2d56FkD7VwChQxobxuxFA7uk6xwPNc1hTUxUHPgccBO5BWfpmFVAsmblayB4xNgAfBp6d4nddKFOyHw1PQ5lyHVOyogPsam1CB3Ye71fC58ZkojJVDzM0tr5zln+9b+n4M/sz11xc9oocSJTZeQ+ql4Oq+LVMLfrXgJfxZ4No3Psp16HSnJS06ADfb21CQ7DjeB/kH+on0ASvDYzwz2iMW7OXfhc8KlYfakhfY4lbgmp8uSaqfcBZj/IumJnfKXDAY62NPLRsPiSdTvwFqbTJ9q5+4qZvn1d7A4owdX2W1ETushAd4EdtTTyyrMG58Jqg/d0YR0d88/ssaP97JrlsRAfY2dbEF5fWK+HNPJ8w06RS13j22qVcXx0cd7ZTjG+6IHvuLXEx6bDz05XNVArB8/2DdMbG7FY9Eyllc8jg6dWLuanWV8HzvYN9rTHt9/WDYvT0JNl7xWEK9JH7QVsTh65fzj2NNRVIaX2HOlKmtnFhHbfNKWRl5oj5trB1Bh2z3Ztyj3omKEZPT5H9d2hCqCVMNwXMphvDxuIdrU2bXrwwIhJpc9zQcTOwecyU+/G3dy0AHrHFnWBi5n4M5aM3zjdRHi8zPYMXgFmsJdtzwKct4VuAdpQBZLr70XVtlWHxnqpI7+HB0aZMKmFgJ/BtlKeMX8brOWSPkmPAXyzhA2SfGbgOeB04z8zOowQwXEzRXwTutMTpwLwC05XfXd4Q+cjhkyQlFyWWLl2CPeAA8DdL+BDwNLDREieYfCh0JqgsVqtLojxR/+5xuuLuedV1D7fUH8Q0L570KPLa6QXgK2R7y5jAV1EndUsONz290FHhFMoo8SnUseerKeyIURJ4A/jVVVWRZ9BEK/AF4E5DiAb89a0fBQ4Dv0b9mTX7xA2Uj/tG1LtuRJ258+tIlRtiboQsdM8a1F+UfBx18iSCOhQwXXFGUZWdTin3qg6k/FI4YlTcUVdViTfnxnIhUd6oCS7tGzAC/Bzlp16J8tDVfSqXU+RM7b2nMpfdldcL4oYQxTp+7ZQ0ynljeKYLApfZjpxTLpv90BniihQ9ID+B6GVIIHoZEohehgSilyGB6GVIIHoZEohehgSilyGB6GVIIHoZEohehgSilyH5RLfbuYMGcoWQz56eJNvePepzWQKKxP8BFfBTv9YXSZoAAAAASUVORK5CYII="/></svg>
          </a>
        </div>
      </div><!-- .site-branding -->

      <nav id="right-side-navigation" class="flex-child">

        <?php
          wp_nav_menu( array(
            'theme_location' => 'right-main-menu',
            'menu_id'        => 'right-main-menu',
          ) );
        ?>
      </nav><!-- #right-side-navigation -->

      <div class="nav-button-wrapper flex-child">
        <button id="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;}</style></defs><title>mobile-nav-background</title><path class="a" d="M30,0A30,30,0,1,0,60,30,30,30,0,0,0,30,0Zm0,57.85A27.85,27.85,0,1,1,57.85,30,27.88,27.88,0,0,1,30,57.85Z"/></svg>

          <div id="nav-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
        </button>
      </div>

    </div>
	</header><!-- #masthead -->

  <?php if( function_exists( 'fuse_eng_custom_header_section' ) ) : fuse_eng_custom_header_section(); endif; ?>

	<div id="content" class="site-content">
