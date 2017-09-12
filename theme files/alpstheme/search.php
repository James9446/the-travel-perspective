<?php
/**
 * The template for displaying search results pages.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
	if(isset($GLOBALS['alpstheme']['post-sidebar']) && $GLOBALS['alpstheme']['post-sidebar'] !=0 && $GLOBALS['alpstheme']['sidebar-position'] == "right")
	{
		$alpsclass = esc_html("alps-sidebar-right");
	}
	elseif(isset($GLOBALS['alpstheme']['post-sidebar']) && $GLOBALS['alpstheme']['post-sidebar'] !=0 && $GLOBALS['alpstheme']['sidebar-position'] == "left")
	{
		$alpsclass = esc_html("alps-sidebar-left");
	}
	elseif(!isset($GLOBALS['alpstheme']['post-sidebar']))
	{
		$alpsclass = esc_html("alps-sidebar-right");
	}
}

?>

	<section id="primary" class="content-area <?php if(isset($alpsclass)){ echo esc_attr($alpsclass); } ?>">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'alpstheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

    <div class="sidebar widget-area ">
	<?php get_sidebar(); ?>
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

