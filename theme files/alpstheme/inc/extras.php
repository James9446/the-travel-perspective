<?php
/**
 * Custom functions that act independently of the theme templates.
 * Eventually, some of the functionality here could be replaced by core features.
 * @package alpstheme
 */

function alpstheme_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'alpstheme_body_classes' );

function alpstheme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'alpstheme_pingback_header' );
