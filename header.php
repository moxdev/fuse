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
            <svg xmlns="http://www.w3.org/2000/svg" width="235.33" height="117.44" viewBox="0 0 235.33 117.44"><defs><style>.a{fill:#fff;}.b{fill:#00bfd6;}</style></defs><title>fuse-engineering-logo</title><polygon class="a" points="97.32 57.62 97.33 31.34 89.9 31.34 89.9 57.62 97.32 57.62"/><path class="a" d="M113.18,38.77h43.9V31.35h-43.9a11,11,0,0,0-11,11v8.06a10.94,10.94,0,0,0,11,11H144.7a3.6,3.6,0,0,1,3.54,3.53v8.06a3.61,3.61,0,0,1-3.54,3.54H100.85v7.43H144.7a11,11,0,0,0,11.06-11V64.86a11,11,0,0,0-11.06-11H113.18a3.6,3.6,0,0,1-3.54-3.53V42.3A3.6,3.6,0,0,1,113.18,38.77Z"/><path class="a" d="M171.51,76.46A3.6,3.6,0,0,1,168,72.93V61.33h46.11v-19a11,11,0,0,0-11.05-11H171.09a10.7,10.7,0,0,0-1.66.21h-.07l-.11,0h0l-.62.16-.18.05h-.05l-.19.06-.1,0-.71.26h0l-.14.06-.2.09c-.19.08-.36.17-.54.26l-.05,0-.17.09-.05,0a9,9,0,0,0-.78.47l-.05,0-.32.23-.44.32-.16.14-.05,0-.13.1A10.93,10.93,0,0,1,168,41.89a3.59,3.59,0,0,1,3.48-3.11H203a3.54,3.54,0,0,1,3.53,3.53V53.9h-46v19a10.94,10.94,0,0,0,11,11h63.82V76.46Z"/><path class="b" d="M157.08,31.34a11,11,0,0,1,11,11L168,53.9h-7.43l-.1-11.65a3.4,3.4,0,0,0-3.36-3.47V31.34Z"/><path class="a" d="M89.89,73h0a3.62,3.62,0,0,1-3.61,3.45H58.42a3.6,3.6,0,0,1-3.53-3.53v-22H47.46v22a10.94,10.94,0,0,0,11,11H87.09l.28,0,.32,0,.33,0,.41-.07.37-.08.47-.12.4-.12c.17-.05.35-.12.53-.19l.41-.15c.19-.08.39-.18.59-.28l.4-.19c.22-.12.44-.26.66-.4l.34-.22a10,10,0,0,0,1-.77l0-.06A11,11,0,0,1,89.89,73Z"/><path class="a" d="M44.81,24.64h-.89a8.69,8.69,0,0,1,.89.05Z"/><path class="a" d="M44.29,32.11a2.33,2.33,0,0,0-.37,0V24.64h-24V11a3.6,3.6,0,0,1,3.53-3.53H37.81V0H23.42a10.83,10.83,0,0,0-11,11V24.64H0v7.47H12.46v85.33H20l-.09-85.33Z"/><path class="b" d="M43.92,24.64a10.94,10.94,0,0,1,11,11V50.91H47.45V35.6a3.6,3.6,0,0,0-3.53-3.53V24.64Z"/><path class="b" d="M100.85,83.89a10.94,10.94,0,0,1-11-11V57.61h7.43V72.93a3.6,3.6,0,0,0,3.53,3.53v7.43Z"/></svg>
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
