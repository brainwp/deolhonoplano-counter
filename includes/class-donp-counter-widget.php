<?php
/**
 * DONP_Counter_Widget class.
 */
class DONP_Counter_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'donp-counter-widget',
			__( 'Contador', 'donp-counter' ),
			array( 'description' => __( 'Exibe um widget para contar diferen&ccedil;a entre datas.', 'donp-counter' ), )
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param  array $instance Previously saved values from database.
	 *
	 * @return string          Widget options form.
	 */
	public function form( $instance ) {
		$title       = isset( $instance['title'] ) ? $instance['title'] : '';
		$before_text = isset( $instance['before_text'] ) ? $instance['before_text'] : '';
		$date1       = isset( $instance['date1'] ) ? $instance['date1'] : date( 'Y-m-d', strtotime( 'now' ) );
		$date2       = isset( $instance['date2'] ) ? $instance['date2'] : date( 'Y-m-d', strtotime( '+1 month' ) );
		$after_text  = isset( $instance['after_text'] ) ? $instance['after_text'] : '';

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'T&iacute;tulo:', 'donp-counter' ); ?>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'before_text' ); ?>">
				<?php _e( 'Texto antes da data:', 'donp-counter' ); ?>
				<input id="<?php echo $this->get_field_id( 'before_text' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'before_text' ); ?>" type="text" value="<?php echo esc_attr( $before_text ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'date1' ); ?>">
				<?php _e( 'Primeira data:', 'donp-counter' ); ?>
				<input id="<?php echo $this->get_field_id( 'date1' ); ?>" size="10" name="<?php echo $this->get_field_name( 'date1' ); ?>" type="text" value="<?php echo esc_attr( $date1 ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'date2' ); ?>">
				<?php _e( 'Segunda data:', 'donp-counter' ); ?>
				<input id="<?php echo $this->get_field_id( 'date2' ); ?>" size="10" name="<?php echo $this->get_field_name( 'date2' ); ?>" type="text" value="<?php echo esc_attr( $date2 ); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'color_scheme' ); ?>">
				<?php _e( 'Texto do final:', 'donp-counter' ); ?>
				<input id="<?php echo $this->get_field_id( 'after_text' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'after_text' ); ?>" type="text" value="<?php echo esc_attr( $after_text ); ?>" />
			</label>
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param  array $new_instance Values just sent to be saved.
	 * @param  array $old_instance Previously saved values from database.
	 *
	 * @return array               Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['before_text'] = ( ! empty( $new_instance['before_text'] ) ) ? sanitize_text_field( $new_instance['before_text'] ) : '';
		$instance['date1'] = ( ! empty( $new_instance['date1'] ) ) ? sanitize_text_field( $new_instance['date1'] ) : '';
		$instance['date2'] = ( ! empty( $new_instance['date2'] ) ) ? sanitize_text_field( $new_instance['date2'] ) : '';
		$instance['after_text'] = ( ! empty( $new_instance['after_text'] ) ) ? sanitize_text_field( $new_instance['after_text'] ) : '';

		return $instance;
	}

	/**
	 * Outputs the content of the widget.
	 *
	 * @param  array  $args      Widget arguments.
	 * @param  array  $instance  Widget options.
	 *
	 * @return string            Facebook like box.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$counter = new DONP_Counter(
			$instance['before_text'],
			$instance['date1'],
			$instance['date2'],
			$instance['after_text'],
			'donp-counter-widget-text'
		);
		echo $counter->render();

		echo $args['after_widget'];
	}
}

/**
 * Register the Widget.
 *
 * @return void
 */
function donp_counter_widget() {
	register_widget( 'DONP_Counter_Widget' );
}

add_action( 'widgets_init', 'donp_counter_widget' );
