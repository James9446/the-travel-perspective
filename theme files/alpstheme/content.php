<?php

/**
 * Template part for displaying posts.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package alpstheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-aos="zoom-out" data-aos-anchor-placement="center-bottom" >
	<header class="entry-header" >
        
		<!-- POST IAMGE -->
		<?php if(has_post_thumbnail() and !is_single() ) : ?>
		<div class="post-image">
			<a href="<?php echo esc_url( get_permalink() ); ?> "><?php the_post_thumbnail('full-thumb'); ?></a>
		</div>
		<?php endif; ?>
        
		<!-- POST TITLE -->
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>

		<!-- POST DATE AND COMMENT -->
		<div class="entry-meta">
			<?php alpstheme_posted_on(); ?>

			<?php
            if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo wp_kses( __( '&nbsp;&nbsp;|&nbsp;&nbsp;<span class="comments-link">', 'alpstheme' ), array( 'span' => array( 'class' => array() ) ) );
                /* translators: %s: post title */
                comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'alpstheme' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo wp_kses( __( '</span>', 'alpstheme' ), array( 'span' => array( 'class' => array() ) ) );
            }
            ?>

		</div><!-- .entry-meta -->
		<?php
		endif;
		?>
  
	</header><!-- .entry-header -->

		<?php
		if ( is_single() ) :
		?>
            <div class="entry-content">
                <?php
                    the_content( sprintf(
                        /* translators: %s: Name of current post. */
                        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'alpstheme' ), array( 'span' => array( 'class' => array() ) ) ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                    ) );
        
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alpstheme' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </div><!-- .entry-content -->		
        <?php
        else :
		?>
            <div class="entry-content">
				<?php
                $content = get_the_content();
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>',']]&gt;', $content);
                echo substr(strip_tags($content),0,100); 
				echo esc_html__('...', 'alpstheme');
				?>
            <div class="readmore fancy"><a href="<?php echo esc_url( get_permalink() ); ?>"><span><?php echo esc_html__('CONTINUE READING', 'alpstheme') ?></span></a></div>
            </div>
        <?php
		endif;
		?>

	<footer class="entry-footer">
		<?php alpstheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->