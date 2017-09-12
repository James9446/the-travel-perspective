<?php
/**
 * Plugin Name: Facebook Widget
 */

add_action( 'widgets_init', 'alpstheme_facebook_load_widget' );

function alpstheme_facebook_load_widget() {
	register_widget( 'alpstheme_facebook_widget' );
}

class alpstheme_facebook_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function alpstheme_facebook_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'alpstheme_facebook_widget', 'description' => __('A widget that displays a Facebook Like Box', 'alpstheme') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'alpstheme_facebook_widget' );

		/* Create the widget. */
		parent::__construct( 'alpstheme_facebook_widget', __('Alpstheme: Facebook Like Box', 'alpstheme'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$page_url = $instance['page_url'];
		$faces = $instance['faces'];
		$stream = $instance['stream'];
		$cover = $instance['cover'];
		
		/* Before widget (defined by themes). */
		echo wp_kses($before_widget, array('div' => array( 'id' => array(), 'class' => array() ) ) ); 

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
		echo wp_kses($before_title . $title . $after_title, array('h4' => array('class' => array())) ); 

		?>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-page" data-href="<?php echo esc_url($page_url); ?>" data-hide-cover="<?php if($cover) { esc_html_e('false','alpstheme'); } else { esc_html_e('true','alpstheme'); } ?>" data-show-facepile="<?php if($faces) { esc_html_e('true','alpstheme'); } else { esc_html_e('false','alpstheme'); } ?>" data-show-posts="<?php if($stream) { esc_html_e('true','alpstheme'); } else { esc_html_e('false','alpstheme'); } ?>"></div>
			
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
		$instance['page_url'] = strip_tags( $new_instance['page_url'] );
		$instance['faces'] = strip_tags( $new_instance['faces'] );
		$instance['stream'] = strip_tags( $new_instance['stream'] );
		$instance['cover'] = strip_tags( $new_instance['cover'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Find us on Facebook', 'cover' => 'on', 'faces' => 'on', 'page_url' => '', 'stream' => false);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />
		</p>

		<!-- Page url -->
		<p>
			<label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php _e('Facebook Page URL:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" value="<?php echo $instance['page_url']; ?>" style="width:96%;" />
			<small><?php _e('EG. http://www.facebook.com/envato','alpstheme'); ?></small>
		</p>

		<!-- Faces -->
		<p>
			<label for="<?php echo $this->get_field_id( 'faces' ); ?>"><?php _e('Show Faces:','alpstheme'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'faces' ); ?>" name="<?php echo $this->get_field_name( 'faces' ); ?>" <?php checked( (bool) $instance['faces'], true ); ?> />
		</p>
		
		<!-- Stream -->
		<p>
			<label for="<?php echo $this->get_field_id( 'stream' ); ?>"><?php _e('Show Stream:','alpstheme'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'stream' ); ?>" name="<?php echo $this->get_field_name( 'stream' ); ?>" <?php checked( (bool) $instance['stream'], true ); ?> />
		</p>
		
		<!-- Cover -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cover' ); ?>"><?php _e('Show Page Cover Image:','alpstheme'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'cover' ); ?>" name="<?php echo $this->get_field_name( 'cover' ); ?>" <?php checked( (bool) $instance['cover'], true ); ?> />
		</p>


	<?php
	}
}

?>