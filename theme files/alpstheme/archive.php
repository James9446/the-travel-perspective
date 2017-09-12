<?php
/**
 * The template for displaying archive pages.
 * @link https://codex.wordpress.org/Template_Hierarchy
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

	elseif(!isset($GLOBALS['alpstheme']['post-sidebar'])):

		$alpsclass = esc_html("alps-sidebar-right");
		
	endif;
}
?>

	<div id="primary" class="content-area <?php if(isset($alpsclass)){ echo esc_attr($alpsclass); } ?>">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>

			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

			?>
			<div class="list"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
			<?php 
			
			endwhile;

			the_posts_navigation();

		else :
			?>
			<div class="list"><?php get_template_part( 'template-parts/content', 'none' ); ?> </div>
			<?php

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

    <div class="sidebar widget-area ">
	<?php //get_sidebar(); ?>
    </div><!-- .widget -->
    
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