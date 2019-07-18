<?php namespace TrafficLight;

include_once "TrafficLightInterface.php";
include_once "GreenLightState.php";
include_once "YellowLightOnState.php";

class RedLightState implements TrafficLightInterface {
	
	public $timeShouldBeOn = 40;
	public $timer         = 1;
	protected $state;
	
	public function __construct ( TrafficLight $context ) {
		$this->state = $context;
	}
	
	public function onOff () {
		if(!$this->state->getIsTimeSlabChanged()) {
			if ( $this->timer === $this->timeShouldBeOn ) {
				$this->state->setState( new GreenLightState( $this->state ) );
				$this->state->setCurrentTimeSlab( 'day');
				$this->timer = 0;
				return;
			}
		}else{
			$this->state->setState( new YellowLightOnState( $this->state ) );
			$this->state->setCurrentTimeSlab( 'night');
		}
		$this->timeController();
	}
	
	private function timeController () {
		$this->timer ++;
	}
	
	public function stateInfo () {
		return "Red Light";
	}
}