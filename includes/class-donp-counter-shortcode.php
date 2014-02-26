<?php
/**
 * DONP_Counter_Shortcode class.
 */
class DONP_Counter_Shortcode {

	public static function counter( $atts ) {
		extract( shortcode_atts( array(
			'text_before' => '',
			'date_start'  => '',
			'date_end'    => '',
			'text_after'  => '',
			'class'       => 'donp-counter-shortcode',
		), $atts ) );

		$counter = new DONP_Counter( $text_before, $date_start, $date_end, $text_after, $class );

		return $counter->render();
	}
}

add_shortcode( 'contador', array( 'DONP_Counter_Shortcode', 'counter' ) );
