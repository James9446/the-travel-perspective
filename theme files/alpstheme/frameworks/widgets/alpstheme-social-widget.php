<?php
/**
 * Plugin Name: Social Widget
 */

add_action( 'widgets_init', 'alpstheme_social_load_widget' );

function alpstheme_social_load_widget() {
	register_widget( 'alpstheme_social_widget' );
}

class alpstheme_social_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function alpstheme_social_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'alpstheme_social_widget', 'description' => __('A widget that displays your social icons', 'alpstheme') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'alpstheme_social_widget' );

		/* Create the widget. */
		parent::__construct( 'alpstheme_social_widget', __('Alpstheme: Social Icons', 'alpstheme'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$googleplus = $instance['googleplus'];
		$instagram = $instance['instagram'];
		$youtube = $instance['youtube'];
		$tumblr = $instance['tumblr'];
		$pinterest = $instance['pinterest'];
		$linkedin = $instance['linkedin'];
		$rss = $instance['rss'];
		
		/* Before widget (defined by themes). */
		echo wp_kses($before_widget, array('div' => array( 'id' => array(), 'class' => array() ) ) ); 

		/* Display the widget title if one was input (before and after defined by themes). */
		if (isset($title))
		echo wp_kses($before_title . $title . $after_title, array('h4' => array('class' => array())) ); 

		?>
			<div class="widget-social">
				<?php if(isset($instance['facebook']) and $instance['facebook'] != "") : ?><a href="<?php echo esc_url($instance['facebook']); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
				<?php if(isset($instance['twitter']) and $instance['twitter'] !="") : ?><a href="<?php echo esc_url($instance['twitter']); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
				<?php if(isset($instance['instagram']) and $instance['instagram'] != "") : ?><a href="<?php echo esc_url($instance['instagram']); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
				<?php if(isset($instance['pinterest']) and $instance['pinterest'] != "") : ?><a href="<?php echo esc_url($instance['pinterest']); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
				<?php if(isset($instance['googleplus']) and $instance['googleplus'] != "") : ?><a href="<?php echo esc_url($instance['googleplus']); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
				<?php if(isset($instance['thumblr']) and $instance['thumblr'] != "") : ?><a href="<?php echo esc_url($instance['thumblr']); ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
				<?php if(isset($instance['youtube']) and $instance['youtube'] != "") : ?><a href="<?php echo esc_url($instance['youtube']); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
				<?php if(isset($instance['linkedin']) and $instance['linkedin'] != "") : ?><a href="<?php echo esc_url($instance['linkedin']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
				<?php if(isset($instance['rss']) and $instance['rss'] != "") : ?><a href="<?php echo $instance['rss']; ?>" target="_blank"><i class="fa fa-rss"></i></a><?php endif; ?>
				<div class="clearfix"></div>
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
		$instance['facebook'] = strip_tags( $new_instance['facebook'] );
		$instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
		$instance['instagram'] = strip_tags( $new_instance['instagram'] );
		$instance['youtube'] = strip_tags( $new_instance['youtube'] );
		$instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
		$instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
		$instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
		$instance['rss'] = strip_tags( $new_instance['rss'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Subscribe & Follow', 'facebook' => '', 'twitter' => '', 'instagram' => '', 'pinterest' => '', 'googleplus' => '', 'tumblr' => '', 'youtube' => '', 'linkedin' => '', 'rss' => '');
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		?>
        
        

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php esc_html($instance['title']); ?>" style="width:90%;" />
		</p>
		
		<p>Note: Set your social links in the Customizer</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Show Facebook:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo esc_url($instance['facebook']); ?>" style="width:90%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Show Twitter:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_url($instance['twitter']); ?>" style="width:90%;" />

		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e('Show Instagram:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo esc_url($instance['instagram']); ?>" style="width:90%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Show Pinterest:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo esc_url($instance['pinterest']); ?>" style="width:90%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e('Show Google Plus:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" value="<?php echo esc_url($instance['googleplus']); ?>" style="width:90%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e('Show Tumblr:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo esc_url($instance['tumblr']); ?>" style="width:90%;" />

		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e('Show Youtube:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo esc_url($instance['youtube']); ?>" style="width:90%;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('Show Linkedin:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo esc_url($instance['linkedin']); ?>" style="width:90%;" />

		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e('Show RSS:','alpstheme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo esc_url($instance['rss']); ?>" style="width:90%;" />
		</p>


	<?php
	}
}

?>