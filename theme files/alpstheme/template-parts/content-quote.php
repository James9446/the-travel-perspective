<?php
/**
 * Template part for displaying posts.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package alpstheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> data-aos="fade-up" data-aos-anchor-placement="center-bottom"  >
	<header class="entry-header">

		<!-- POST TITLE -->
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;
		?>
        
		<!-- POST IMAGE  -->
		<?php if(has_post_thumbnail()) : ?>
		<div class="post-image">
			<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('medium_large'); ?></a>
		</div>

		<?php endif; ?>
        
		<?php
        if ( 'post' === get_post_type() ) : ?>
		<!-- POST DATE AND COMMENT -->
		<div class="entry-meta">
			<?php alpstheme_posted_on(); ?>
            
		<!-- comment -->
			<?php
            if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
                esc_html_e('&nbsp;&nbsp;|&nbsp;&nbsp;', 'alpstheme') . wp_kses('<span class="comments-link">' , array( 'span' => array( 'class' => array() )));
                /* translators: %s: post title */
                comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'alpstheme' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
                echo wp_kses('</span>', array( 'span' => array( 'class' => array() )));
            }
            ?>   

		</div><!-- .entry-meta -->
		<?php
		endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'alpstheme' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alpstheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php alpstheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
