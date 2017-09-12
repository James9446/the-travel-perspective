<?php
/**
 * Plugin Name: Latest Posts Widget
 */

add_action( 'widgets_init', 'alpstheme_latest_news_load_widget' );

function alpstheme_latest_news_load_widget() {
	register_widget( 'alpstheme_latest_news_widget' );
}

class alpstheme_latest_news_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function alpstheme_latest_news_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'alpstheme_latest_news_widget', 'description' => __('A widget that displays your latest posts from all categories or a certain', 'alpstheme') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'alpstheme_latest_news_widget' );

		/* Create the widget. */
		parent::__construct( 'alpstheme_latest_news_widget', __('Alpstheme: Latest Posts', 'alpstheme'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$categories = $instance['categories'];
		$number = $instance['number'];

		
		$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'cat' => $categories);
		
		$loop = new WP_Query($query);
		if ($loop->have_posts()) :
		
		/* Before widget (defined by themes). */
		echo wp_kses($before_widget, array('div' => array( 'id' => array(), 'class' => array() ) ) ); 

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
		echo wp_kses($before_title . $title . $after_title, array('h4' => array('class' => array())) ); 

		?>
			<ul class="side-newsfeed">
			
			<?php  while ($loop->have_posts()) : $loop->the_post(); ?>
			
				<li>
				
					<div class="side-item">
						<div class="side-item-text">
							<h4><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link:', 'alpstheme'); the_title(); ?>"><?php the_title(); ?></a></h4>
						</div>
					</div>
				
				</li>
			
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			<?php endif; ?>
			
			</ul>
			
		<?php

		/* After widget (defined by themes). */
		echo wp_kses($after_widget, array('div' => array('id' => array(), 'class' => array() ))); 

	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['categories'] = $new_instance['categories'];
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Latest Posts', 'alpstheme'), 'number' => 5, 'categories' => '');
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'alpstheme' );
		}
		if ( isset( $instance[ 'number' ] ) ) {
			$number = $instance[ 'number' ];
		}
		else {
			$number = __( 'Enter Number', 'alpstheme' );
		}

		
		?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'alpstheme'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>"  />
		</p>
		
		<!-- Category -->
		<p>
		<label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Filter by Category:','alpstheme'); ?></label> 
		<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
			<option value='all' <?php if ('all' == $instance['categories']) esc_html('selected="selected"'); ?>><?php _e('All categories','alpstheme'); ?></option>
			<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
			<?php foreach($categories as $category) { ?>
			<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) esc_html('selected="selected"'); ?>><?php echo esc_attr($category->cat_name); ?></option>
			<?php } ?>
		</select>
		</p>
		
		<!-- Number of posts -->
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show:', 'alpstheme'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr( $number ); ?>" size="3" />
		</p>


	<?php
	}
}

?>