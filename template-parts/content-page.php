<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fuse_Engineering
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php
    if (! function_exists( 'fuse_eng_seo_page_titles' ) ) :
      function fuse_eng_seo_page_titles() {
        if(function_exists('get_field')) {
          $onPageTitle = get_field('on_page_title');

          if($onPageTitle) { ?>
            <header class="entry-header">
              <h1 class="entry-title">
                <?php echo wp_kses(
                  $onPageTitle,
                  array(
                    'span' => array(),
                    'em' => array(),
                    'strong' => array()
                  )
                ); ?>
              </h1>
            </header><!-- .entry-header -->
          <?php } else { ?>
            <header class="entry-header">
              <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->
          <?php }
        }
      }
    endif;
  ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fuse_eng' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'fuse_eng' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
