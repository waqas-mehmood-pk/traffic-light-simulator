<?php namespace Test;

use TrafficLight\TrafficLightInterface;
use TrafficLight\YellowLightOnState;
use TrafficLight\TrafficLight;

class YellowLightOnTest extends \PHPUnit_Framework_TestCase {
	
	/** @test */
	public function timer_can_not_be_more_than_time_should_be_on () {
		$state = new YellowLightOnState( new TrafficLight() );
		$state->onOff();
		$this->assertLessThanOrEqual( $state->timeShouldBeOn, $state->timer );
	}
	
	/** @test */
	public function class_should_be_implement_the_interface () {
		$light = new YellowLightOnState(new TrafficLight());
		$this->assertInstanceOf( TrafficLightInterface::class, $light);
	}
	
	/** @test */
	public function state_info_should_be_return_string () {
		$state = new YellowLightOnState( new TrafficLight() );
		//$this->assertIsString( $state->stateInfo());
		$this->assertInternalType( 'string', $state->stateInfo() );
	}
	
	/** @test */
	public function state_info_should_be_return_green_light () {
		$state = new YellowLightOnState( new TrafficLight() );
		$this->assertEquals( 'Yellow Light On', $state->stateInfo() );
	}
	
}