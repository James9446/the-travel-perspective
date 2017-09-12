<?php

/**
 * Plugin Name: About Widget
 */

add_action( 'widgets_init', 'alpstheme_about_load_widget' );

function alpstheme_about_load_widget() {
	register_widget( 'alpstheme_about_widget' );
}

class alpstheme_about_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function alpstheme_about_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'alpstheme_about_widget', 'description' => esc_html__('A widget that displays an About widget', 'alpstheme') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'alpstheme_about_widget' );

		/* Create the widget. */
		parent::__construct( 'alpstheme_about_widget', esc_html__('Alpstheme: About Me', 'alpstheme'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$image = $instance['image'];
		$description = $instance['description'];
		
		/* Before widget (defined by themes). */
		echo wp_kses($before_widget, array('div' => array( 'id' => array(), 'class' => array() ) ) ); 

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
		echo wp_kses($before_title . $title . $after_title, array('h4' => array('class' => array())) );

		?>
			
			<div class="about-widget">
			
			<?php if($image) : ?>
			<img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr($title); ?>" />
			<?php endif; ?>
			
			<?php if($description) : ?>
			<p><?php esc_html($description, 'alpstheme'); ?></p>
			<?php endif; ?>	
			
			</div>
			
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
		$instance['image'] = strip_tags( $new_instance['image'] );
		$instance['description'] = $new_instance['description'];

		return $instance;
	}


	function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'alpstheme' );
		}
		
		if ( isset( $instance[ 'image' ] ) ) {
			$image = $instance[ 'image' ];
		}
		else {
			$image = __( 'New Image', 'alpstheme' );
		}

		if ( isset( $instance[ 'description' ] ) ) {
			$description = $instance[ 'description' ];
		}
		else {
			$description = __( 'New description', 'alpstheme' );
		}

		 ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" style="width:96%;" />
		</p>
		
		<!-- image url -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e('Image URL:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo esc_attr( $image ); ?>" style="width:96%;" /><br />
			<small><?php _e('Insert your image URL. For best result use 300px width.','alpstheme'); ?></small>
		</p>

		<!-- description -->
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e('About me text:','alpstheme'); ?></label>
			<textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" style="width:95%;" rows="6"><?php echo esc_html( $description ); ?></textarea>
		</p>


	<?php
	}
}

?>