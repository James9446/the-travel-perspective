<?php
/**
 * alpstheme functions and definitions.
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package alpstheme
 */
 
/**
 * Kirki
 */

//include_once( get_template_directory() . '/frameworks/init.php' );


if ( ! function_exists( 'alpstheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alpstheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on alpstheme, use a find and replace
	 * to change 'alpstheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'alpstheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'alpstheme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'alpstheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'alpstheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alpstheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alpstheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'alpstheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alpstheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alpstheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'alpstheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'alpstheme_widgets_init' );

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Custom functions that act independently of the theme templates. */
require get_template_directory() . '/inc/extras.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Load Jetpack compatibility file. */
require get_template_directory() . '/inc/jetpack.php';


// WIDGETS 
require_once(get_template_directory().'/frameworks/widgets/alps-about_widget.php');
require_once(get_template_directory().'/frameworks/widgets/alps-facebook_widget.php');
require_once(get_template_directory().'/frameworks/widgets/alps-post_widget.php');
require_once(get_template_directory().'/frameworks/widgets/alps-social_widget.php');

// REGISTER FOOTER WIDGETS 
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => esc_html__('Sidebar', 'alpstheme' ),
		'id' => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'alpstheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer 1', 'alpstheme' ),
		'id' => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'alpstheme' ),
		'before_widget' => '<div id="%1$s" class="widget first %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer 2', 'alpstheme' ),
		'id' => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'alpstheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'name' => esc_html__('Footer 3', 'alpstheme' ),
		'id' => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here.', 'alpstheme' ),
		'before_widget' => '<div id="%1$s" class="widget last %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Instagram', 'alpstheme' ),
		'id' => 'sidebar-5',
		'description'   => esc_html__( 'Add widgets here.', 'alpstheme' ),
		'before_widget' => '<div id="%1$s" class="widget-instagram %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="instagram-heading">',
		'after_title' => '</h4>',
		'description' => 'Use the "Instagram" widget here. IMPORTANT: For best result select "Photo size" > "Large" and set number of images to 8.',
	));
}


/* ENQUEUE SCRIPTS AND STYLES */
function alpstheme_scripts()
{

// MASONRY
wp_enqueue_script( 'jquery-masonry' );

// MASONRY
wp_enqueue_style( 'alpstheme-style', get_stylesheet_uri() );
wp_enqueue_script( 'alpstheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

// COMMENTS
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
{
	wp_enqueue_script( 'comment-reply' );
}

// RESPONSIVE
wp_enqueue_style( 'alps-responsive', get_template_directory_uri() . '/css/alps-responsive.css' );

// BOOTSTRAP
wp_enqueue_style( 'alpsblog-style', get_stylesheet_uri() );
wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );

// FONT AWESOME
wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

// MENU
wp_enqueue_style( 'alps-nav-menu', get_template_directory_uri() . '/css/alps-nav-menu.css' );

// OWL CAROUSEL
wp_enqueue_style('alps-owl.carousel', get_template_directory_uri() .'/css/alps-owl.carousel.css', array(), null, 'all' );
wp_enqueue_style('alps-owl.theme', get_template_directory_uri() .'/css/alps-owl.theme.css', array(), null, 'all' );
wp_enqueue_script('alps-owl.carousel', get_template_directory_uri() . '/js/alps-owl.carousel.js', array(), '1.0.0', true );

// JUSTIFY GALLERY
wp_enqueue_style('justifiedGallery.min', get_template_directory_uri() .'/css/justifiedGallery.min.css', array(), null, 'all' );
wp_enqueue_script('jquery.justifiedGallery.min', get_template_directory_uri() . '/js/jquery.justifiedGallery.min.js', array(), '1.0.0', true );

// ALPS THEME SETTING
wp_enqueue_script('alpstheme', get_template_directory_uri() . '/js/alpstheme.js', array(), '1.0.0', true );

// LAZY LOAD EFFECT
wp_enqueue_style('alps-aos', get_template_directory_uri() .'/css/alps-aos.css', array(), null, 'all' );

// STICKY NAV
wp_enqueue_script('alps-headroom-min', get_template_directory_uri() . '/js/alps-headroom-min.js', array(), '', true );
wp_enqueue_script('alps-headroom', get_template_directory_uri() . '/js/alps-headroom.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'alpstheme_scripts' );


/* YOUTUBE URL FILTER */
function get_youtube_id_from_url($url)
{
    if (stristr($url,'youtu.be/'))
        {preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
    else 
        {@preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5]; }
}

/* GENERATE DYNAMIC CSS  */
include(get_template_directory().'/frameworks/alps-option-panel-style.php');

/* REQUIRED PLAGINS */
require_once get_template_directory() . '/frameworks/alps-class-tgm-plugin-list.php';
add_action( 'tgmpa_register', 'alpstheme_register_required_plugins' );

/* SHOW POST FORMAT OPTIONS IN THE POST SECTION */
add_theme_support( 'post-formats', array(
	'aside',
	'image',
	'audio',
	'video',
	'quote',
	'link',
	'gallery',

) );

/* NUMBERED PAGINATION */
if ( ! function_exists( 'alps_pagination' ) ) {

	function alps_pagination( $pages = '', $range = 2 ) {  
	  
		$showitems = ( $range * 2 ) + 1;

		global $paged;
		if ( empty( $paged ) ) {
			$paged = 1;
		}

		if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
			if( !$pages ) {
			 $pages = 1;
			}
		}

		if ( 1 != $pages ) {

			if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) {
				echo "<a href='".esc_url( get_pagenum_link(1) )."'><i class='fa fa-angle-double-left'></i></a>";
			}

			if ( $paged > 1 ) {
				echo "<a href='".esc_url( get_pagenum_link( $paged - 1 ) )."'><i class='fa fa-angle-left'></i></a>";
			}

			for ( $i=1; $i <= $pages; $i++ ) {
				if (1 != $pages &&( !( $i >= $paged+$range+1 || $i <= $paged-$range-1 ) || $pages <= $showitems ) ) {
				 echo ( $paged == $i )? "<span class='current'>".$i."</span>":"<a href='".esc_url( get_pagenum_link( $i ) )."' class='inactive' >".$i."</a>";
				}
			}

			if ( $paged < $pages ) {
				echo "<a href='". esc_url( get_pagenum_link( $paged + 1 ) )."'><i class='fa fa-angle-right'></i></a>";
			}

			if ( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages ) {
				echo "<a href='". esc_url( get_pagenum_link($pages) )."'><i class='fa fa-angle-double-right'></i></a>";
			}
		}
	}
}

/* CUSTOM FIELDS OPTIONS */
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_audio-url',
		'title' => 'Audio URL',
		'fields' => array (
			array (
				'key' => 'field_5874dbf7a49b9',
				'label' => '',
				'name' => 'audio_url',
				'type' => 'text',
				'instructions' => 'enter your soundcloud music id here',
				'default_value' => '',
				'placeholder' => 'soundcloud music id',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post-header',
		'title' => 'Post Header',
		'fields' => array (
			array (
				'key' => 'field_580321b71b7b8',
				'label' => 'Post Header',
				'name' => 'post_header',
				'type' => 'select',
				'instructions' => 'Select your Featured Image Display Style.',
				'choices' => array (
					'wide' => 'Wide',
					'standard' => 'Standard',
				),
				'default_value' => 'standard : Standard',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_youtube-url',
		'title' => 'Youtube URL',
		'fields' => array (
			array (
				'key' => 'field_5874d119192f9',
				'label' => '',
				'name' => 'youtube_url',
				'type' => 'text',
				'instructions' => 'enter youtube video url here.',
				'default_value' => '',
				'placeholder' => 'youtube url',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
}

/* GOOGLE FONTS */
function alpstheme_google_fonts_url() {
$fonts_url = '';
 
$qwigley = _x( 'on', 'qwigley font: on or off', 'alpstheme' );
$montez = _x( 'on', 'montez font: on or off', 'alpstheme' );
$rouge = _x( 'on', 'rouge+script font: on or off', 'alpstheme' );
$raleway =  _x( 'on', 'raleway font: on or off', 'alpstheme' );
 
if ( 'off' !== $qwigley || 'off' !== $montez || 'off' !== $rouge || 'off' !== $raleway )
{
	$font_families = array();
 
	if ( 'off' !== $qwigley ) {
	$font_families[] = 'Qwigley:400,700,400italic';
	}
	
	if ( 'off' !== $montez ) {
	$font_families[] = 'Montez:400,700,400italic';
	}
	
	if ( 'off' !== $rouge ) {
	$font_families[] = 'Rouge:400,700,400italic';
	}
	
	if ( 'off' !== $raleway ) {
	$font_families[] = 'Raleway:400,700,400italic';
	}
 
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
}

return esc_url_raw( $fonts_url );
}

function alpstheme_scripts_styles()
{
	wp_enqueue_style( 'alpstheme-fonts', alpstheme_google_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'alpstheme_scripts_styles' );


/* COMMENT FORM  */
function alpstheme_comment_form($arg,$class='btn-variant',$id='submit'){
    ob_start();
    comment_form($arg);
    $form = ob_get_clean();
    echo str_replace('id="submit"','id="'.$id.'" class="'.$class.'"', $form);
}

function alpstheme_list_comments($comment, $args, $depth){
    $path = get_template_directory() . '/template-parts/list_comments.php';
    if( is_file($path) ) require ($path);
}


/* NEXT PREVIOUS POST  */
if ( ! function_exists( 'the_prev_next_posts' ) ) {
  function the_prev_next_posts() {

    $previous_post = get_previous_post();
    $next_post = get_next_post();

    if (!empty( $previous_post ) || !empty( $next_post )) { ?>

    <div class="posts-pagination">

      <?php if (!empty( $previous_post )) { ?>
        <article class="alps-previous-post">
            <?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post->ID), 'small'); ?>
                <div>
                <div class="previous-post-heading"><?php echo esc_html('Previous Post', 'alpstheme') ?></div>
                <h3><a href="<?php echo get_permalink( $previous_post->ID ); ?>" ><?php echo get_the_title($previous_post->ID); ?></a></h3>
                </div>
        </article>
      <?php } ?>

      <?php if (!empty( $next_post )) { ?>
        <article class="alps-next-post">
            <?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'small'); ?>
                <div>
                <div class="next-post-heading"><?php echo esc_html('Next Post', 'alpstheme') ?></div>
                <h3><a href="<?php echo get_permalink( $next_post->ID ); ?>" class="post-pagination-title"><?php echo get_the_title($next_post->ID); ?></a></h3>
                </div>
        </article>
      <?php } ?>
	<div class="clearfix"></div>
    </div>

  <?php }

  }
}



/* SHOWS RELATED POSTS */

if ( ! function_exists( 'the_related_posts' ) ) {
  function the_related_posts() {

    $post_id = get_the_ID();

    $categories = get_the_category($post_id);
    if ($categories) {

      $category_ids = array();
      foreach($categories as $category) $category_ids[] = $category->term_id;
      $related_args = array(
        'category__in'     => $category_ids,
        'post__not_in'     => array($post_id),
        'posts_per_page'   => 4,
        'orderby' => 'rand'
      );
      $related = new WP_Query( $related_args );
	  
      if ( $related->have_posts() ) { ?>

            <div class="title-related" ><?php esc_html_e('You May also Like','alpstheme');?></div>

             <div class="row related-post">
              <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                <div class="col-md-3">
                <?php get_template_part( 'get-template-part/', 'content' ); ?>
                  <article>
                    <?php if ( has_post_thumbnail() ) { ?>
                      <div class="post-thumbnail"><a href="<?php the_permalink();?>"><?php the_post_thumbnail('large'); ?></a></div>
                    <?php } ?>
                    <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                  </article>
                </div>
              <?php endwhile; ?>
              </div>

        <?php wp_reset_postdata(); ?>

      <?php }
    }
  }
}