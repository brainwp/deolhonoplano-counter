<?php
/**
 * Plugin Name: De Olho no Plano - Contador
 * Plugin URI:  http://deolhonoplano.org.br/
 * Description: Contador.
 * Version:     1.0.0
 * Author:      Brasa
 * Author URI:  http://brasa.art.br/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Plugin main class.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-donp-counter.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-donp-counter-widget.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-donp-counter-shortcode.php';

/**
 * Counter function.
 *
 * @param  string $before Text before the date.
 * @param  string $start  Start date.
 * @param  string $end    End date.
 * @param  string $after  Text after the date.
 * @param  string $class  HTML class.
 *
 * @return string
 */
function donp_counter( $before, $start, $end, $after, $class = 'donp-counter-text' ) {
	$counter = new DONP_Counter( $before, $start, $end, $after, $class );

	return $counter->render();
}
