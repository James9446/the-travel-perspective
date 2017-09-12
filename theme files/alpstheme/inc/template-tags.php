<?php

/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 * @package alpstheme
 */

if ( ! function_exists( 'alpstheme_posted_on' ) ) :

function alpstheme_posted_on() {

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {

		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';

	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'alpstheme' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'alpstheme' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

?>
	<span class="posted-on"><?php echo $posted_on; ?></span><span class="byline"><?php echo $byline; ?></span>
<?php
}

endif;

if (!function_exists( 'alpstheme_entry_footer' ) ) :

function alpstheme_entry_footer() {

	if ( 'post' === get_post_type() ) {

		$categories_list = get_the_category_list( esc_html__( ', ', 'alpstheme') );

		if ( $categories_list && alpstheme_categorized_blog() ) {

		}

		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'alpstheme') );

		if ( $tags_list ) {
		}
	}

	edit_post_link(

		sprintf(

			/* translators: %s: Name of current post */

			esc_html__( 'Edit %s', 'alpstheme'),

			the_title( '<span class="screen-reader-text">"', '"</span>', false )

		),

		'<span class="edit-link">',

		'</span>'

	);

}

endif;

/**
 * Returns true if a blog has more than 1 category.
 * @return bool
 */

function alpstheme_categorized_blog() {

	if ( false === ( $all_the_cool_cats = get_transient( 'alpstheme_categories' ) ) ) {

		// Create an array of all the categories that are attached to posts.

		$all_the_cool_cats = get_categories( array(

			'fields'     => 'ids',

			'hide_empty' => 1,

			// We only need to know if there is more than one category.

			'number'     => 2,

		) );

		// Count the number of categories that are attached to the posts.

		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'alpstheme_categories', $all_the_cool_cats );

	}

	if ( $all_the_cool_cats > 1 ) {

		// This blog has more than 1 category so alpstheme_categorized_blog should return true.
		return true;

	} else {

		// This blog has only 1 category so alpstheme_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in alpstheme_categorized_blog.
 */

function alpstheme_category_transient_flusher() {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Like, beat it. Dig?
	delete_transient( 'alpstheme_categories' );
}

add_action( 'edit_category', 'alpstheme_category_transient_flusher' );
add_action( 'save_post',     'alpstheme_category_transient_flusher' );

