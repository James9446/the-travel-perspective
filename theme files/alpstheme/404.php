<?php
/**
 * The template for displaying 404 pages (not found).
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'alpstheme' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'alpstheme' ); ?></p>

					<?php
						get_search_form();


						// Only show the widget if site has multiple categories.
						if ( alpstheme_categorized_blog() ) :
					?>



				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
    
    <div class="sidebar widget-area ">
	<?php get_sidebar();  endif; ?>
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
