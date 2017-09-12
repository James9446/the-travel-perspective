<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
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

	<div id="primary" class="content-area <?php if( isset($alpsclass) ){ echo esc_attr($alpsclass); } ?> ">
		<main id="main" class="site-main" role="main">
		<?php

		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;
			
			/* Start the Loop */
			
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				 
				if(isset($_GET['style']))
				{
					if($_GET['style'] == "1")
					{
					?>
                   	<div class="col-md-12 alps-post-standard"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
					<?php
					}
					elseif($_GET['style'] == "2"){ ?>
                    	<div class="grid col-md-6"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
<?php				}elseif($_GET['style'] == "3"){ ?>
                    	<div class="grid col-md-4"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
<?php				}elseif($_GET['style'] == "masonry"){ ?>
    					<div class="brick" ><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
<?php				}elseif($_GET['style'] == "list"){ ?>
    					<div class="list"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
<?php 				}
				}
				else
				{
					if (isset($GLOBALS['alpstheme']['display-style']) && $GLOBALS['alpstheme']['display-style'] == 'standard' )
					{
					?>
                   	<div class="col-md-12 alps-post-standard"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
					<?php	
					}elseif (isset($GLOBALS['alpstheme']['display-style']) && $GLOBALS['alpstheme']['display-style']  == 'grid2' ){ ?>
						<div class="grid col-md-6"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
<?php 				}elseif (isset($GLOBALS['alpstheme']['display-style']) && $GLOBALS['alpstheme']['display-style'] == 'grid3' ){ ?>
						<div class="grid col-md-4"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
<?php 				}elseif (isset($GLOBALS['alpstheme']['display-style']) && $GLOBALS['alpstheme']['display-style']  == 'masonry' ){ ?>
						<div class="brick"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
<?php 				}elseif (isset($GLOBALS['alpstheme']['display-style']) && $GLOBALS['alpstheme']['display-style']  == 'list' ){ ?>
						<div class="list"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
<?php				}
					else
					{ ?>
						<div class="list"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
<?php				}

				}
				endwhile;

				else :

				if(isset($_GET['style']))
				{
					if($_GET['style'] == "1")
					{
					?>
                   	<div class="col-md-12 alps-post-standard"><?php get_template_part( 'template-parts/content', 'none' ); ?> </div>
					<?php
					}
					elseif($_GET['style'] == "2"){ ?>
                    	<div class="grid col-md-6"><?php get_template_part( 'template-parts/content', 'none' ); ?> </div>
<?php				}elseif($_GET['style'] == "3"){ ?>
                    	<div class="grid col-md-4"><?php get_template_part( 'template-parts/content', 'none' ); ?> </div>
<?php				}elseif($_GET['style'] == "masonry"){ ?>
    					<div class="brick"><?php get_template_part( 'template-parts/content', 'none' ); ?> </div>
<?php				}elseif($_GET['style'] == "list"){ ?>
    					<div class="list"><?php get_template_part( 'template-parts/content', 'none' ); ?> </div>
<?php 				}
				}
				else
				{
					if ( $GLOBALS['alpstheme']['display-style'] == 'standard' )
					{
					?>
                   	<div class="col-md-12 alps-post-standard"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
					<?php
					}elseif ( $GLOBALS['alpstheme']['display-style'] == 'grid2' ){ ?>
						<div class="grid col-md-6"><?php get_template_part( 'template-parts/content', 'none' ); ?> </div>
<?php 				}elseif ( $GLOBALS['alpstheme']['display-style'] == 'grid3' ){ ?>
						<div class="grid col-md-4"><?php get_template_part( 'template-parts/content', 'none' ); ?> </div>
<?php 				}elseif ( $GLOBALS['alpstheme']['display-style'] == 'masonry' ){ ?>
						<div class="brick"><?php get_template_part( 'template-parts/content', 'none' ); ?> </div>
<?php 				}elseif ( $GLOBALS['alpstheme']['display-style'] == 'list' ){ ?>
						<div class="list"><?php get_template_part( 'template-parts/content', 'none' ); ?> </div>
<?php				}
					else
					{ ?>
						<div class="list"><?php get_template_part( 'template-parts/content', get_post_format() ); ?> </div>
<?php				}
				}
	
			endif; ?>

		</main><!-- #main -->

        <!-- Pagination start -->
        <div class='numbered-pagination'><?php alpstheme_pagination(); ?></div>
        <!-- Pagination end -->
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
elseif(!isset($GLOBALS['alpstheme']['post-sidebar']))
{
	get_sidebar();
}


get_footer();
