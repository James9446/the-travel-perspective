<?php

/**
 * The template for displaying all single posts.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package alpstheme
 */

get_header(); ?>

<?php

if(isset($_GET["sidebar"]))
{
	if($_GET["sidebar"] == "no")
	{
		$alpsclass = null;
	}
	elseif($_GET["sidebar"] == "left")
	{
		$alpsclass = esc_html("alps-sidebar-left");
	}
	elseif($_GET["sidebar"] == "right")
	{
		$alpsclass = esc_html("alps-sidebar-right");
	}
}
else
{
	if(isset($GLOBALS['alpstheme']['post-sidebar']) && $GLOBALS['alpstheme']['post-sidebar'] !=0 && $GLOBALS['alpstheme']['sidebar-position'] == "right"):

		$alpsclass = esc_html("alps-sidebar-right");

	elseif(isset($GLOBALS['alpstheme']['post-sidebar']) && $GLOBALS['alpstheme']['post-sidebar'] !=0 && $GLOBALS['alpstheme']['sidebar-position'] == "left"):

		$alpsclass = esc_html("alps-sidebar-left");

	else:

		$alpsclass = null;	

	endif;
}
?>

	<div id="primary" class="content-area <?php if(isset($alpsclass)){ echo esc_attr($alpsclass); } ?>">
		<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', get_post_format() );
			echo the_tags( '<ul class="post-tags"><li>', '</li><li>', '</li></ul>' );
			alpstheme_the_prev_next_posts();
			alpstheme_the_related_posts();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

if(isset($_GET['sidebar']) && $_GET['sidebar'] == "no")
{
	"";
}
elseif(isset($_GET['sidebar']) && $_GET['sidebar'] == "left" || isset($_GET['sidebar']) && $_GET['sidebar'] == "right")
{
	get_sidebar();
}
elseif(isset($GLOBALS['alpstheme']['post-sidebar']) && $GLOBALS['alpstheme']['post-sidebar'] == 1)
{
	get_sidebar();
}

get_footer();
