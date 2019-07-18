<?php namespace TrafficLight;

include_once "GreenYellowLightState.php";
include_once "TrafficLightInterface.php";
include_once "YellowLightOnState.php";

class GreenLightState implements TrafficLightInterface {
	
	public $timeShouldBeOn = 30;
	public $timer         = 1;
	protected $state;
	
	public function __construct ( TrafficLight $context ) {
		$this->state = $context;
	}
	
	public function onOff () {
		if(!$this->state->getIsTimeSlabChanged()) {
			if ( $this->timer === $this->timeShouldBeOn ) {
				$this->state->setState( new GreenYellowLightState( $this->state ) );
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
		$this->timer++;
	}
	
	public function stateInfo () {
		return "Green Light";
	}
}