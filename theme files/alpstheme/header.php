<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package alpstheme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- PRE-LOADER START -->
<div id="preloader"><div id="status">&nbsp;</div></div>
<!-- PRE-LOADER END -->

<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'alpstheme' ); ?></a>

<header id="masthead" class="site-header" >

<?php	if (isset($GLOBALS['alpstheme']['header-top-status']) && $GLOBALS['alpstheme']['header-top-status'] != "0" ){ ?>
<div class="container-fluid">
<div class="header-top">
	<div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6" id="cssmenu-cat" >
			<?php if ( has_nav_menu( 'categories-menu' ) ) { ?>
            <?php wp_nav_menu( array(
            'menu'              => 'categories menu',
            'theme_location'    => 'categories-menu',
            'menu_class'        => '',
            'container'         => '',
            'container_class'   => '',
            )); ?>
            <?php } ?>
            
            </div>
            <div class="col-sm-6 col-md-6">
                <div id="top-search">
                    <a href="#"><i class="fa fa-search"></i></a>
                </div>
                <div class="show-search">
                    <?php get_search_form(); ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php } ?>

<!-- HEADER LOGO ABOVE NAVIGATION - DEFAULT -->
<?php if(isset($GLOBALS['alpstheme']['header-img-animation']) && $GLOBALS['alpstheme']['header-img-animation'] != "0" )
{
	$img_ani_status = "img-animation";
}elseif(isset($GLOBALS['alpstheme']['header-img-animation-y']) && $GLOBALS['alpstheme']['header-img-animation-y'] != "0" )
{
	$img_ani_status = "img-animation-y";
}
else
{
	$img_ani_status = "img-static";
}

?>
<div class="logoabove <?php if(isset($img_ani_status)){ echo esc_attr($img_ani_status); } ?>">

<!-- BRANDING -->

<div class="site-branding " >
   <?php
	if ( isset($GLOBALS['alpstheme']['desk-logo']['url']) && $GLOBALS['alpstheme']['desk-logo']['url'] != "" ) :
	?>	
	<div class="logo"><a href="<?php echo esc_url( site_url( '/' ) ); ?>"><img src="<?php echo esc_url($GLOBALS['alpstheme']['desk-logo']['url']);  ?>" title="<?php bloginfo( 'name' ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="158" height="158" /></a></div>
    <?php
    else :
	?>
    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
    <?php
    endif;

    $description = get_bloginfo( 'description', 'display' );
	if (isset($GLOBALS['alpstheme']['slogan']) && $GLOBALS['alpstheme']['slogan'] != "0" ){ ?>
        <p class="site-description"><?php echo esc_html($description, 'alpstheme');  ?></p>
    <?php } ?>
</div>

<!--NAVIGATION --> 
<div id="cssmenu">
	<?php if ( has_nav_menu( 'header-menu' ) ) { ?>
    <?php wp_nav_menu( array(
    'menu'              => 'header menu',
    'theme_location'    => 'header-menu',
    'menu_class'        => '',
    'container'         => '',
    'container_class'   => '',
    )); } ?>
</div>


<!-- STICKY NAVIGATION -->
<div id="stickynav" >
    <div class="container text-center">
        <div id="cssmenu-scroll">
			<?php if ( has_nav_menu( 'header-menu' ) ) { ?>
            <?php wp_nav_menu( array(
            'menu'              => 'header menu',
            'theme_location'    => 'header-menu',
            'menu_class'        => '',
            'container'         => '',
            'container_class'   => '',
            )); ?>
            <?php }else{?>
		    <div class="alps-alert-message"><?php _e('Go to Appearance -> Menu -> Select theme location as Header Menu', 'alpstheme') ?>
            <?php } ?>
        </div>
    </div>
</div>

</div>

<!-- HEADER SLIDER START -->
<?php

if (is_home() && isset($GLOBALS['alpstheme']['owlslider']) && $GLOBALS['alpstheme']['owlslider'] != 'none' ) :

	global $post_slidepost;
	
	// STANDARD SLIDER
	$standardquery = new WP_Query();
	$standardquery = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>10,
	'tax_query' => array(
		array( 'taxonomy' => 'post_format', 'field' => 'slug', 'terms' =>
		array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-video', 'post-format-audio', 'post-format-chat'), 'operator' => 'NOT IN') ))
	);
	$post_slidepost .= '<div class="'.esc_attr($GLOBALS['alpstheme']['slider_width']).' slide-standard" >';

	// GET VALUES
	if(isset($_GET['slide']) && $_GET['slide'] == "1"):
		$post_slidepost .= '<div class="slide-single" >';
	elseif(isset($_GET['slide']) && $_GET['slide'] == "2"):
		$post_slidepost .= '<div class="slide-double" >';
	elseif(isset($_GET['slide']) && $_GET['slide'] == "3"):
		$post_slidepost .= '<div class="slide-triple" >';
	elseif(isset($_GET['slide']) && $_GET['slide'] == "no"):
		$post_slidepost .= '<div class="slide-triple" style="display:none" >';
	// DEFAULT SETTING
	elseif(isset($GLOBALS['alpstheme']['owlslider']) && $GLOBALS['alpstheme']['owlslider'] == 'staging'):
		$post_slidepost .= '<div class="slide-staging" >';
	elseif(isset($GLOBALS['alpstheme']['owlslider']) && $GLOBALS['alpstheme']['owlslider'] == 'single'):
		$post_slidepost .= '<div class="slide-single" >';
	elseif(isset($GLOBALS['alpstheme']['owlslider']) && $GLOBALS['alpstheme']['owlslider'] == 'double'):
		$post_slidepost .= '<div class="slide-double" >';
	elseif(isset($GLOBALS['alpstheme']['owlslider']) && $GLOBALS['alpstheme']['owlslider'] == 'triple'):
		$post_slidepost .= '<div class="slide-triple" >';
	elseif(isset($GLOBALS['alpstheme']['owlslider']) && $GLOBALS['alpstheme']['owlslider'] == ""):
		$post_slidepost .= '<div class="slide-single" >';
	endif;

	echo wp_kses($post_slidepost,
	array(
		'div' => array(
			'class' => array(),
			'style' => array()
			),
		'a' => array(
			'href' => array(),
			'title' => array()
			),
		 )
	); 

	global	$post_slidepost1;

	while ($standardquery->have_posts()) : $standardquery->the_post();

	?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div class="item" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>); background-size:cover;"><p><span><?php echo esc_html(get_the_title()); ?></span></p></div></a>
	<?php
	endwhile;
	?>
	</div></div>

<?php
	wp_reset_postdata();
endif

?>
<!-- HEADER SLIDER END -->

</div>

</header>

<!-- SHOW POST THUMBNAIL WIDE  -->
<?php

		if(has_post_thumbnail() && isset($GLOBALS['alpstheme']['post-header']) && $GLOBALS['alpstheme']['post-header'] == "wide" && !is_archive() && !is_home() && !is_search() ){ ?>
			<div class="post-header"><?php the_post_thumbnail('full'); ?></div>
<?php	}elseif(has_post_thumbnail() && function_exists('get_field') && get_field('post_header') == "wide" && isset($GLOBALS['alpstheme']['post-header']) && $GLOBALS['alpstheme']['post-header'] == "default" && !is_archive() && !is_home() && !is_search() ){ ?>
			<div class="post-header"><?php the_post_thumbnail('full'); ?></div>
<?php 	} ?>
<!-- SHOW POST THUMBNAIL WIDE END  -->

<div class="<?php if (isset($GLOBALS['alpstheme']['layout']) && $GLOBALS['alpstheme']['layout'] == "wide"): echo esc_attr('container-fluid'); else: echo esc_attr('container'); endif ?>">
	<div id="content" class="site-content">
