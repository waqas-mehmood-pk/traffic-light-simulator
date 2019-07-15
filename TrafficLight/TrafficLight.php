<?php namespace TrafficLight;

include_once "GreenLightState.php";

class TrafficLight {
	
	protected $state;
	protected $isTimeSlabChanged = false;
	protected $currentTimeSlab   = 'day';
	
	public function __construct () {
		$this->state = new GreenLightState( $this );
		date_default_timezone_set( 'Asia/Karachi' );
	}
	
	public function processor () {
		$this->state->onOff();
	}
	
	public function stateInfo () {
		return $this->state->stateInfo();
	}
	
	public function updateTimeSlabChanged () {
		$dayTimeStart   = "06:00";
		$nightTimeStart = "23:00";
		if ( date( 'H:i' ) >= date( 'H:i', strtotime( $dayTimeStart ) ) &&
				 date( 'H:i' ) <= date( 'H:i', strtotime( $nightTimeStart ) ) ) {
			$this->isTimeSlabChanged = $this->currentTimeSlab === 'day' ? false : true;
		} else {
			$this->isTimeSlabChanged = $this->currentTimeSlab === 'night' ? false : true;
		}
	}
	
	public function setState ( $state ) {
		$this->state = $state;
	}
	
	public function getIsTimeSlabChanged () {
		$this->updateTimeSlabChanged();
		return $this->isTimeSlabChanged;
	}
	
	public function setCurrentTimeSlab ($timeSlab) {
		$this->currentTimeSlab = $timeSlab;
	}
}