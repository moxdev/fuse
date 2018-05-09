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
            <svg xmlns="http://www.w3.org/2000/svg" width="235.35" height="117.46" viewBox="0 0 235.35 117.46"><defs><style>.header-logo-a{fill:#fff;}</style></defs><title>fuse-white-logo</title><polygon class="header-logo-a" points="97.32 57.62 97.33 31.34 89.9 31.34 89.9 57.62 97.32 57.62"/><path class="header-logo-a" d="M113.18,38.77h43.9V31.35h-43.9a11,11,0,0,0-11,11v8.06a10.94,10.94,0,0,0,10.88,11H144.7a3.6,3.6,0,0,1,3.54,3.53V73a3.61,3.61,0,0,1-3.54,3.54H100.85V84H144.7a11,11,0,0,0,11.06-10.94v-8.2a11,11,0,0,0-11-11H113.18a3.6,3.6,0,0,1-3.54-3.53v-8A3.6,3.6,0,0,1,113.18,38.77Z" transform="translate(0 0)"/><path class="header-logo-a" d="M171.51,76.46A3.6,3.6,0,0,1,168,72.93V61.33h46.11v-19a11,11,0,0,0-11-11h-32a11.59,11.59,0,0,0-1.66.21h-.18l-.62.16-.18.05h0l-.19.06h-.1l-.71.26h0l-.14.06-.2.09c-.19.08-.36.17-.54.26h-.05l-.17.09h-.05a7.68,7.68,0,0,0-.78.47h0l-.32.23-.44.32-.16.14h0l-.13.1A10.88,10.88,0,0,1,168,41.89a3.59,3.59,0,0,1,3.48-3.11H203a3.54,3.54,0,0,1,3.53,3.53V53.9h-46v19a10.94,10.94,0,0,0,10.88,11h63.94V76.46Z" transform="translate(0 0)"/><path class="header-logo-a" d="M157.08,31.34a11,11,0,0,1,11,11L168,53.9h-7.43l-.1-11.65a3.4,3.4,0,0,0-3.33-3.47h0V31.34Z" transform="translate(0 0)"/><path class="header-logo-a" d="M89.89,73h0a3.62,3.62,0,0,1-3.61,3.45H58.42a3.61,3.61,0,0,1-3.53-3.53v-22H47.46v22a10.94,10.94,0,0,0,10.88,11H88l.41-.07.37-.08.47-.12.4-.12a1.7,1.7,0,0,0,.53-.19l.41-.15c.19-.08.39-.18.59-.28l.4-.19c.22-.12.44-.26.66-.4l.34-.22a10.63,10.63,0,0,0,1-.77v-.06A11,11,0,0,1,89.89,73Z" transform="translate(0 0)"/><path class="header-logo-a" d="M44.81,24.64h-.89a8.85,8.85,0,0,1,.89.05Z" transform="translate(0 0)"/><path class="header-logo-a" d="M44.29,32.11h-.37V24.64h-24V11a3.61,3.61,0,0,1,3.53-3.53H37.81V0H23.42a10.83,10.83,0,0,0-11,10.66h0v14H0v7.47H12.46v85.33H20l-.09-85.33Z" transform="translate(0 0)"/><path class="header-logo-a" d="M43.92,24.64a10.94,10.94,0,0,1,11,10.88h0V50.91H47.45V35.6a3.61,3.61,0,0,0-3.53-3.53Z" transform="translate(0 0)"/><path class="header-logo-a" d="M100.85,83.89A10.94,10.94,0,0,1,89.85,73h0V57.61h7.43V72.93a3.61,3.61,0,0,0,3.53,3.53v7.43Z" transform="translate(0 0)"/></svg>
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

          <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;}</style></defs><title>mobile-nav-60</title><path class="a" d="M30,0A30,30,0,1,0,60,30,30,30,0,0,0,30,0Zm0,57.85A27.85,27.85,0,1,1,57.85,30,27.88,27.88,0,0,1,30,57.85Z"/></svg>

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
