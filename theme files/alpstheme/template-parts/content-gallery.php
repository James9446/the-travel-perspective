<?php

/**
 * Template part for displaying posts.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package alpstheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-aos="fade-up" data-aos-anchor-placement="center-bottom"  >
	<header class="entry-header">
		<!-- GALLERY  -->
		<?php
		if(has_post_format('gallery') && is_single())
		{
			$gallery = get_post_gallery( get_the_ID(), false ); ?>
			<div id="owl-gallery" class="owl-gallery owl-gallery-single">
			<?php foreach( $gallery['src'] AS $src ){ ?>
				<div><img src="<?php echo esc_url($src); ?>" class="my-custom-class" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"  /></div>
			<?php } ?>
			</div>
		<?php
        }
		else
		{
			$gallery = get_post_gallery( get_the_ID(), false ); ?>
			<div id="owl-gallery" class="owl-gallery">
			<?php foreach( $gallery['src'] AS $src ){ ?>
				<div><img src="<?php echo esc_url($src); ?>" class="my-custom-class" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></div>
			<?php } ?>
			</div>
		<?php
        }
		?>
		<!-- GALLERY END -->

		<!-- POST TITLE -->
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :

			foreach((get_the_category()) as $category)
			{ 
				$cat = $category->cat_name . ' '; 
			} 

			the_title( '<div class="catname">'. esc_html($cat) .'</div><h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<!-- POST DATE AND COMMENT -->
		<div class="entry-meta">
			<?php alpstheme_posted_on(); ?>
            
			<!-- comment -->
			<?php
            if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
                esc_html_e('&nbsp;&nbsp;|&nbsp;&nbsp;', 'alpstheme' ) . wp_kses('<span class="comments-link">' , array( 'span' => array( 'class' => array() )));
                /* translators: %s: post title */
                comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'alpstheme' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
                echo wp_kses('</span>', array( 'span' => array( 'class' => array() )));
            }
            ?>   
		</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->

		<?php
		if ( is_single() ) :
		?>
            <div class="entry-content">
                <?php
  					$content = get_the_content(); echo strip_shortcodes($content);
					
					( sprintf(
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
                echo substr(strip_tags($content),0,155);
				esc_html_e('...', 'alpstheme' );
				?>
            <div class="readmore fancy"><a href="<?php echo esc_url(get_permalink()); ?>"><span><?php echo esc_html__('CONTINUE READING', 'alpstheme') ?></span></a></div>
            </div>
        <?php
		endif;
		?>

	<footer class="entry-footer">
		<?php alpstheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
