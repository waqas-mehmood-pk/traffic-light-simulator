<?php namespace TrafficLight;

include_once "TrafficLightInterface.php";
include_once "RedLightState.php";
include_once "YellowLightOnState.php";

class GreenYellowLightState implements TrafficLightInterface {
	
	protected $timeShouldBeOn = 5;
	protected $timer         = 1;
	protected $state;
	
	public function __construct ( TrafficLight $context ) {
		$this->state = $context;
	}
	
	public function onOff () {
		if(!$this->state->getIsTimeSlabChanged()) {
			if ( $this->timer === $this->timeShouldBeOn ) {
				$this->state->setState( new RedLightState( $this->state ) );
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
		return "Green Yellow Light " . date( "i:s" ) . " $this->timer\n";
	}
}