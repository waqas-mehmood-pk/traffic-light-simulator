<?php namespace TrafficLight;

include_once "TrafficLightInterface.php";
include_once "YellowLightOffState.php";
include_once "GreenLightState.php";

class YellowLightOnState implements TrafficLightInterface {
	
	public $timeShouldBeOn  = 1;
	public $timer           = 1;
	protected $state;
	
	public function __construct ( TrafficLight $context ) {
		$this->state = $context;
	}
	public function onOff () {
		if(!$this->state->getIsTimeSlabChanged()) {
			if ( $this->timer === $this->timeShouldBeOn ) {
				$this->state->setState( new YellowLightOffState( $this->state ) );
				$this->state->setCurrentTimeSlab( 'night');
				$this->timer = 0;
				return;
			}
		}else{
			$this->state->setState( new GreenLightState( $this->state ) );
			$this->state->setCurrentTimeSlab( 'day');
		}
		$this->timeController();
	}
	
	private function timeController () {
		$this->timer ++;
	}
	
	public function stateInfo () {
		return "Yellow Light On";// . date( "i:s" ) . " $this->timer\n";
	}
}