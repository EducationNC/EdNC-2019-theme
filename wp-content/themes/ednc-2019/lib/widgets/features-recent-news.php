<?php

namespace Roots\Sage\Widgets;

class Features_Recent_News extends \WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
    parent::__construct(
			'features_recent_news', // Base ID
			__( 'Features and Recent News', 'sage' ), // Name
			array( 'description' => __( 'Displays today\'s features and recent news', 'sage' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$before_widget = $args['before_widget'];
		$after_widget = $args['after_widget'];
		$title = $instance['title'];

		echo $before_widget;
    include(locate_template('templates/widgets/features-recent-news.php'));
		echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	 public function form( $instance ) {
		 //$number = ! empty( $instance['number'] ) ? $instance['number'] : 1;
		 ?>
		 <!-- <p>
			 <label for="<?php //echo $this->get_field_id( 'title' ); ?>"><?php //_e( 'Label:' ); ?></label>
			 <input class="widefat" id="<?php //echo $this->get_field_id( 'title' ); ?>" name="<?php //echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php //echo esc_attr( $title ); ?>">
		 </p> -->
		 <?php
	 }

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		//$instance = array();
		// $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		//return $instance;

	}
}
