<?php
/**
 * DONP_Counter class.
 */
class DONP_Counter {

	public function __construct( $before, $start, $end, $after, $class = 'donp-counter-text' ) {
		$this->before = $before;
		$this->start  = $start;
		$this->end    = $end;
		$this->after  = $after;
		$this->class  = $class;
	}

	protected function start_date() {
		return ( '' != $this->start ) ? $this->start : date( 'Y-m-d', strtotime( 'now' ) );
	}

	protected function end_date() {
		return ( '' != $this->end ) ? $this->end : date( 'Y-m-d', strtotime( 'now' ) );
	}

	protected function days_diff() {
		$start = new DateTime( $this->start_date() );
		$end   = new DateTime( $this->end_date() );
		$diff  = $start->diff( $end );

		return $diff->days;
	}

	public function render() {
		$diff = $this->days_diff();

		$html = '<span class="donp-counter ' . $this->class . '">';
		$html .= $this->before;
		$html .= ' ';
		$html .= sprintf( _n( '1 dia', '%s dias', $diff, 'donp-counter' ), $diff );
		$html .= ' ';
		$html .= $this->after;
		$html .= '</span>';

		return $html;
	}
}
