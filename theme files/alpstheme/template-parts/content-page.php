<?php
/**
 * Template part for displaying page content in page.php.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package alpstheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

    <!-- SHOW POST THUMBNAIL STANDARD  -->
    <?php if(has_post_thumbnail() && $GLOBALS['alpstheme']['post-header'] == "standard" ){ ?>
        <div class="post-header-standard"><?php the_post_thumbnail(); ?></div>
    <?php }elseif(has_post_thumbnail() && get_field('post_header') == "standard" && $GLOBALS['alpstheme']['post-header'] == "default" ){ ?>
        <div class="post-header-standard"><?php the_post_thumbnail('medium_large'); ?></div>
    <?php } ?>
    <!-- SHOW POST THUMBNAIL STANDARD END  -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alpstheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						esc_html__( 'Edit %s', 'alpstheme' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
