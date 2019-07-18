<?php namespace Test;

use TrafficLight\GreenLightState;
use TrafficLight\TrafficLight;
use TrafficLight\TrafficLightInterface;

class GreenLightTest extends \PHPUnit_Framework_TestCase {
	
	/** @test */
	public function timer_can_not_be_more_than_time_should_be_on () {
		$state = new GreenLightState( new TrafficLight() );
		$state->onOff();
		$this->assertLessThanOrEqual( $state->timeShouldBeOn, $state->timer );
	}
	
	/** @test */
	public function class_should_be_implement_the_interface () {
		$light = new GreenLightState(new TrafficLight());
		$this->assertInstanceOf( TrafficLightInterface::class, $light);
	}
	
	/** @test */
	public function state_info_should_be_return_string () {
		$state = new GreenLightState( new TrafficLight() );
		//$this->assertIsString( $state->stateInfo());
		$this->assertInternalType( 'string', $state->stateInfo() );
	}
	
	/** @test */
	public function state_info_should_be_return_green_light () {
		$state = new GreenLightState( new TrafficLight() );
		$this->assertEquals( 'Green Light', $state->stateInfo() );
	}
	
}