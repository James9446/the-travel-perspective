<?php
/**
 * Template part for displaying posts.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package alpstheme
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-aos="fade-up" data-aos-anchor-placement="top-bottom" >
	<header class="entry-header" >
        
		<!-- POST IAMGE -->
		<?php if(has_post_thumbnail() && !is_single() ) : ?>
		<div class="post-image">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium_large'); ?></a>
		</div>
		<?php endif; ?>
        
		<!-- POST TITLE -->
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );

			foreach((get_the_category()) as $category)
			{
			?>
				<a href='<?php echo esc_url(get_category_link($category)); ?>'><?php echo esc_html($cat = $category->cat_name); ?></a>,
			<?php
			} 
	
		else :
		?>
			<div class='catname'>
		<?php
			foreach((get_the_category()) as $category)
			{
			?>
				<a href='<?php echo esc_url(get_category_link($category)); ?>'><?php echo esc_html($cat = $category->cat_name); ?></a>,
			<?php
			} 
		?>
			</div>
		<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		endif;

		if ( 'post' === get_post_type() ) : ?>
		<!-- POST DATE AND COMMENT -->
		<div class="entry-meta">
			<?php alpstheme_posted_on(); ?>

			<?php
            if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
                esc_html_e('&nbsp;&nbsp;|&nbsp;&nbsp;', 'alpstheme' ) . wp_kses('<span class="comments-link">' , array( 'span' => array( 'class' => array() )));
                /* translators: %s: post title */
                comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'alpstheme' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
                echo wp_kses('</span>', array( 'span' => array( 'class' => array() )));
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
        <!-- SHOW POST THUMBNAIL STANDARD  -->
        <?php if(has_post_thumbnail() && isset($GLOBALS['alpstheme']['post-header']) && $GLOBALS['alpstheme']['post-header'] == "standard" ){ ?>
            <div class="post-header-standard"><?php the_post_thumbnail(); ?></div>
        <?php }elseif(has_post_thumbnail() && function_exists('get_field') && get_field('post_header') == "standard" && $GLOBALS['alpstheme']['post-header'] == "default" ){ ?>
			<div class="post-header-standard"><?php the_post_thumbnail(); ?></div>
        <?php }elseif(has_post_thumbnail() && !isset($GLOBALS['alpstheme']['post-header']) ){ ?>
            <div class="post-header-standard"><?php the_post_thumbnail(); ?></div>
        <?php } ?>
        <!-- SHOW POST THUMBNAIL STANDARD END  -->

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
                echo substr(strip_tags($content),0,155);
				esc_html_e('...', 'alpstheme');
				?>
            <div class="readmore fancy"><a href="<?php echo esc_url(get_permalink()); ?>"><span><?php echo esc_html__('CONTINUE READING','alpstheme') ?></span></a></div>
            </div>
        <?php
		endif;
		?>

	<footer class="entry-footer">
		<?php alpstheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    
</article><!-- #post-## -->
