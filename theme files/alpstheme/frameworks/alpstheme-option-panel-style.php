<?php
function alpstheme_customizer_css() {
?>
<style>

<?php

if(isset($GLOBALS['alpstheme']['header-img-bg']['url']) && $GLOBALS['alpstheme']['header-img-status'] != "0")
{
	$head_img = $GLOBALS['alpstheme']['header-img-bg']['url'];
}
elseif(!isset($GLOBALS['alpstheme']['header-img-bg']['url']))
{
	$head_img = "../images/header-bg.jpg";
}

	if(isset($GLOBALS['alpstheme']['header-height']))
	{
?>
.site-title a{ color:<?php echo esc_attr($GLOBALS['alpstheme']['theme-title']); ?> !important; font-family:<?php echo esc_attr($GLOBALS['alpstheme']['titletypo']['font-family']); ?> !important; font-size:<?php echo esc_attr($GLOBALS['alpstheme']['titletypo']['font-size']); ?> !important; letter-spacing:<?php echo esc_attr($GLOBALS['alpstheme']['titletypo']['letter-spacing']); ?> !important;}
.site-branding{ padding:<?php echo esc_attr($GLOBALS['alpstheme']['header-height']); ?>px 0; background-color:<?php echo esc_attr($GLOBALS['alpstheme']['header-back-color']); ?> }
.site-branding .logo img { max-height:<?php echo esc_attr($GLOBALS['alpstheme']['logo-height']); ?>px; width:auto; }
.site-branding .site-description{ color:<?php echo esc_attr($GLOBALS['alpstheme']['slogan-text-color']); ?>; letter-spacing: <?php echo esc_attr($GLOBALS['alpstheme']['slogantypo']['letter-spacing']); ?>; font-size:15px; padding-top:8px; font-family:<?php echo esc_attr($GLOBALS['alpstheme']['slogantypo']['font-family']); ?>; text-transform:uppercase; }

.header-top li a, #top-search a{color:<?php echo esc_attr($GLOBALS['alpstheme']['header-top-text']); ?> !important;}
.header-top{ background-color:<?php echo esc_attr($GLOBALS['alpstheme']['header-top-bg']); ?> !important; }

.img-animation{ background-image:url('<?php echo esc_url($head_img); ?>') !important; background-repeat: repeat-x; /*background-position:top !important; */ }
.img-animation-y{ background-image:url('<?php echo esc_url($head_img); ?>') !important; background-repeat: repeat-y; background-size:cover; /*background-position:top !important; */ }
.img-static{ background-image:url('<?php echo esc_url($head_img); ?>') !important; background-repeat: repeat-x; background-position:top; }


#cssmenu-scroll, #cssmenu{font-family: '<?php echo esc_attr($GLOBALS['alpstheme']['desk-menu-typo']['font-family']) ?>'; font-size:<?php echo esc_attr($GLOBALS['alpstheme']['desk-menu-typo']['font-size']) ?>; text-transform:<?php echo esc_attr($GLOBALS['alpstheme']['desk-menu-typo']['text-transform']) ?>; background-color:<?php echo esc_attr($GLOBALS['alpstheme']['header-menu-back-color']) ?>; }
#cssmenu-scroll > ul, #cssmenu > ul{background-color:<?php echo esc_attr($GLOBALS['alpstheme']['header-menu-back-color']) ?>;}
#cssmenu-scroll > ul > li > a, #cssmenu > ul > li > a{ color:<?php echo esc_attr($GLOBALS['alpstheme']['menu-link-color']['regular']); ?>}
#cssmenu-scroll > ul > li:hover > a, #cssmenu > ul > li:hover > a{ color:<?php echo esc_attr($GLOBALS['alpstheme']['menu-link-color']['hover']); ?>}

.entry-title{ font-family:<?php echo esc_attr($GLOBALS['alpstheme']['headings-typo']['font-family']); ?> !important;}
.site-content h1, .site-content h2, .site-content h3, .site-content h4, .site-content h5, .site-content h6{ font-family:<?php echo esc_attr($GLOBALS['alpstheme']['headings-typo']['font-family']); ?> !important; font-weight:<?php echo esc_attr($GLOBALS['alpstheme']['headings-typo']['font-weight']) ?>;}
	
.site-content h1 { font-size:<?php echo esc_attr($GLOBALS['alpstheme']['h1-typo']['font-size']); ?> !important; line-height:<?php echo esc_attr($GLOBALS['alpstheme']['h1-typo']['line-height']) ?>;}
.site-content h2 { font-size:<?php echo esc_attr($GLOBALS['alpstheme']['h2-typo']['font-size']); ?> !important; line-height:<?php echo esc_attr($GLOBALS['alpstheme']['h2-typo']['line-height']) ?>;}
.site-content h3 { font-size:<?php echo esc_attr($GLOBALS['alpstheme']['h3-typo']['font-size']); ?> !important; line-height:<?php echo esc_attr($GLOBALS['alpstheme']['h3-typo']['line-height']) ?>;}
.site-content h4 { font-size:<?php echo esc_attr($GLOBALS['alpstheme']['h4-typo']['font-size']); ?> !important; line-height:<?php echo esc_attr($GLOBALS['alpstheme']['h4-typo']['line-height']) ?>;}
.site-content h5 { font-size:<?php echo esc_attr($GLOBALS['alpstheme']['h5-typo']['font-size']); ?> !important; line-height:<?php echo esc_attr($GLOBALS['alpstheme']['h5-typo']['line-height']) ?>;}
.site-content h6 { font-size:<?php echo esc_attr($GLOBALS['alpstheme']['h6-typo']['font-size']); ?> !important; line-height:<?php echo esc_attr($GLOBALS['alpstheme']['h6-typo']['line-height']) ?>;}

.site-content .content-area .site-main article .entry-content{font:300 <?php echo esc_attr($GLOBALS['alpstheme']['main-typo']['font-size']); ?>/<?php echo esc_attr($GLOBALS['alpstheme']['main-typo']['line-height']); ?> <?php echo esc_attr($GLOBALS['alpstheme']['main-typo']['font-family']) ?> ;}

</style>

<?php
	}
}
add_action( 'wp_head', 'alpstheme_customizer_css' );

?>