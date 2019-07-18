<?php namespace Test;

use TrafficLight\GreenLightState;
use TrafficLight\TrafficLight;

class TrafficLightTest extends \PHPUnit_Framework_TestCase {
	
	public $state;
	public $currentTimeSlab = 'day';
	public $isTimeSlabChanged = false;
	private $timeZone = 'Asia/Karachi';
	
	public function setUp(){
		date_default_timezone_set( $this->timeZone );
		//$trafficLight = $this->getMock(TrafficLight::class)
		//->disableOriginalConstructor()
		//										->getMock();
		
		$this->state = new GreenLightState( new TrafficLight());
	}
	
	/** @test */
	public function print_state_information () {
		$this->assertContains( $this->state->stateInfo(), [
			"Green Light",
			"Green Yellow Light",
			"Red Light",
			"Yellow Light Off",
			"Yellow Light On",
		] );
	}
	
	/** @test */
	public function state_should_be_instance_of_green_light () {
		$trafficLight = new TrafficLight();
		$this->assertInstanceOf( GreenLightState::class, $trafficLight->getState());
	}
	
	/** @test */
	public function get_is_time_slab_changed () {
		$trafficLight = new TrafficLight();
		$isTimeSlabChanged = $trafficLight->getIsTimeSlabChanged();
		//$this->assertIsBool($isTimeSlabChanged);
		$this->assertInternalType('bool',$isTimeSlabChanged);
	}

	/** @test */
	public function get_current_time_slab () {
		$this->assertContains( $this->currentTimeSlab, ['day', 'night']);
	}
	
	/** @test */
	public function get_time_zone () {
		$this->assertEquals( $this->timeZone, date_default_timezone_get());
	}
	
	
}