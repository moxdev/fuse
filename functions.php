<?php
/**
 * Fuse Engineering functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fuse_Engineering
 */

if ( ! function_exists( 'fuse_eng_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fuse_eng_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Fuse Engineering, use a find and replace
		 * to change 'fuse_eng' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fuse_eng', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support( 'post-thumbnails' );
    add_image_size('home-feature', 2000, 1000, true);
    add_image_size('feature-img', 1800, 400, true);
    add_image_size('team-bio-img', 300, 300, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
      'left-main-menu'  => esc_html__( ' Left Main Menu', 'fuse_eng' ),
      'right-main-menu' => esc_html__( 'Right Main Menu', 'fuse_eng' ),
      'mobile-menu'     => esc_html__( 'Mobile Menu', 'fuse_eng' ),
      'footer-menu'     => esc_html__( 'Footer Menu', 'fuse_eng' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'fuse_eng_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fuse_eng_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fuse_eng_content_width', 640 );
}
add_action( 'after_setup_theme', 'fuse_eng_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fuse_eng_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fuse_eng' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fuse_eng' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fuse_eng_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fuse_eng_scripts() {
	wp_enqueue_style( 'fuse_eng-style', get_stylesheet_uri() );

	wp_enqueue_script( 'fuse_eng-navigation', get_template_directory_uri() . '/js/min/navigation.min.js', array(), '20151215', true );

  wp_enqueue_script( 'fuse_eng-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  wp_enqueue_script('fuse-eng-object-fit-library', get_template_directory_uri() . '/js/min/ofi.min.js', NULL, NULL, TRUE);

  if( is_front_page() ) {
    wp_enqueue_script('flickity', get_template_directory_uri() . '/js/min/flickity.min.js', NULL, NULL, TRUE);

    wp_enqueue_script('home-testimonial-carousel', get_template_directory_uri() . '/js/min/home-testimonial-carousel.min.js', array('flickity'), NULL, TRUE);
  }

  if( is_page_template( 'page-partners.php' ) ) {
    wp_enqueue_script('glightbox', get_template_directory_uri() . '/js/min/glightbox.min.js', NULL, NULL, TRUE);

    wp_enqueue_script('partners-lightbox', get_template_directory_uri() . '/js/min/partners-lightbox.min.js', array('glightbox'), NULL, TRUE);
  }

  if( is_page_template( 'page-our-team.php' ) ) {
    wp_enqueue_script('read-more-dropdown', get_template_directory_uri() . '/js/min/click-to-display-content.min.js', NULL, NULL, TRUE);
  }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fuse_eng_scripts' );

/**
 * Global Site Information
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Global Website Information',
		'menu_title'	=> 'Site Global Info',
		'menu_slug' 	=> 'global-information',
		'post_id' 	  => 'global-information',
    'capability'	=> 'edit_posts',
    'redirect'    => false
  ));

  acf_add_options_sub_page(array(
    'page_title' 	=> 'SocialSettings',
    'menu_title'	=> 'Social',
    'parent_slug'	=> 'global-information',
    'post_id' 	  => 'social'
  ));
}

/**
 * ADD CUSTOM ALLOWED HTML TAGS
 */

if(!function_exists('custom_add_allowed_tags')) {
  function custom_add_allowed_tags($tags) {
    $tags['iframe'] = array(
      'src'             => array(),
      'height'          => array(),
      'width'           => array(),
      'frameborder'     => array(),
      'allowfullscreen' => array(),
    );

    return $tags;
  }
  add_filter('wp_kses_allowed_html', 'custom_add_allowed_tags');
}

/**
 * Add plus icons into registered "mobile-menu" if menu has childrem items
 */
add_filter( 'walker_nav_menu_start_el', 'wpse_add_menu_icon', 10, 4);
function wpse_add_menu_icon( $item_output, $item, $depth, $args ){
  if( 'mobile-menu' == $args->theme_location && $depth == 0 && in_array('menu-item-has-children', $item->classes ) ) {
    $item_output .='<span class="icon-plus">&#43;</span>';
  }
  return $item_output;
}

/**
 * ADD STYLES TO WYSIWYG
 */

// Insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Use 'mce_buttons' for button row #1, mce_buttons_3' for button row #3
add_filter('mce_buttons_2', 'my_mce_buttons_2');

function my_mce_before_init_insert_formats( $init_array ) {
    $style_formats = array(
      array(
        'title' => 'Button', // Title to show in dropdown
        'block' => 'button', // Element to add class to
        'classes' => 'btn' // CSS class to add
      ),
      array(
        'title' => 'HR Line', // Title to show in dropdown
        'block' => 'hr', // Element to add class to
        'classes' => 'hr-wysiwig-divider' // CSS class to add
      ),
      array(
        'title' => 'Thin Italic', // Title to show in dropdown
        'inline' => 'span', // Element to add class to
        'classes' => 'roboto-thin-italic-text' // CSS class to add
      ),
      array(
        'title' => 'Read More Link', // Title to show in dropdown
        'inline' => 'span', // Element to add class to
        'classes' => 'read-more-link' // CSS class to add
      ),
      array(
        'title' => 'Flex Wrapper div', // Title to show in dropdown
        'block' => 'div', // Element to add class to
        'classes' => 'wysiwig-flex-wrapper' // CSS class to add
      )
    );
    $init_array['style_formats'] = json_encode( $style_formats );
    return $init_array;
}
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

// EDITOR STYLES

function fuse_eng_add_editor_styles() {
  add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'fuse_eng_add_editor_styles' );

// Register Custom Post Type for Testimonial
function fuse_eng_create_custom_post_type() {

  $labels = array(
    'name'                  => 'Testimonials',
    'singular_name'         => 'Testimonial',
    'menu_name'             => 'Testimonials',
    'name_admin_bar'        => 'Testimonials',
    'archives'              => 'Testimonials Archives',
    'attributes'            => 'Testimonials Attributes',
    'parent_item_colon'     => 'Parent Item: Testimonials',
    'all_items'             => 'All Testimonials',
    'add_new_item'          => 'Add New Testimonial',
    'add_new'               => 'Add New Testimonial',
    'new_item'              => 'New Testimonial',
    'edit_item'             => 'Edit Testimonial',
    'update_item'           => 'Update Testimonial',
    'view_item'             => 'View Testimonial',
    'view_items'            => 'View Testimonials',
    'search_items'          => 'Search Testimonials',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into item',
    'uploaded_to_this_item' => 'Uploaded to this item',
    'items_list'            => 'Items list',
    'items_list_navigation' => 'Items list navigation',
    'filter_items_list'     => 'Filter items list',
  );
  $rewrite = array(
    'slug'                  => 'testimonial',
    'with_front'            => true,
    'pages'                 => true,
    'feeds'                 => true,
  );
  $args = array(
    'label'                 => 'Testimonial',
    'description'           => 'Testimonial Section',
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'revisions' ),
    'taxonomies'            => array( 'testimonial' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-testimonial',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => false,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'query_var'             => 'testimonial',
    'rewrite'               => $rewrite,
    'capability_type'       => 'page',
    'show_in_rest'          => true,
  );
  register_post_type( 'testimonials', $args );

}
add_action( 'init', 'fuse_eng_create_custom_post_type', 0 );

/**
 * Move Yoast to bottom
 */
function yoast_to_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Header Image.
 */
require get_template_directory() . '/inc/custom-header-img.php';

/**
 * Custom Header Image.
 */
require get_template_directory() . '/inc/home-page-sections.php';

/**
 * Flexible Conent Sections.
 */
require get_template_directory() . '/inc/flexible-content-sections.php';

/**
 * About Page Sections.
 */
require get_template_directory() . '/inc/about-page-sections.php';

/**
 * Partners Page Sections.
 */
require get_template_directory() . '/inc/partners-page-sections.php';

/**
 * Our Team Page Sections.
 */
require get_template_directory() . '/inc/our-team-page-sections.php';

/**
 * Contact Page Form.
 */
include_once( get_stylesheet_directory() . '/plugins/mm4-you-contact-form/mm4-you-cf.php' );

/**
* Contact Page Sidebar.
*/
require get_template_directory() . '/inc/contact-page-sidebar.php';

