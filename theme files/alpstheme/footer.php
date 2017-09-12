<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package alpstheme
 */

?>

	</div><!-- #content -->
</div><!-- container end here -->

	<footer id="colophon" class="site-footer" role="contentinfo" >
    
		<?php if (is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) : ?>
        <div id="widget-area">
        <div class="container">
            <div class="col-md-4 ">
            <?php dynamic_sidebar( 'sidebar-2' ); ?>
            </div>
            
            <div class="col-md-4 ">
            <?php dynamic_sidebar( 'sidebar-3' ); ?>
            </div>
            
            <div class="col-md-4 ">
            <?php dynamic_sidebar( 'sidebar-4' ); ?>
            </div>
        </div>
        </div>
        <?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
            <div id="footer-instagram">
            <?php dynamic_sidebar( 'sidebar-5' ); ?>
            </div>
    	<?php endif ?>
    
		<div class="site-info">
        <?php echo esc_html('Copyrights &#169; &nbsp;' . date("Y")); ?> - <?php echo esc_html(bloginfo('name'));  ?>
        <?php if(isset($GLOBALS['alpstheme']['footer-copy']) && $GLOBALS['alpstheme']['footer-copy'] != "" ){ echo esc_html($GLOBALS['alpstheme']['footer-copy']); }  ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>