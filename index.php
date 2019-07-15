<?php use TrafficLight\TrafficLight;

include "TrafficLight/TrafficLight.php";

$trafficLight = new TrafficLight();
while ( true ) {
	echo $trafficLight->stateInfo();
	$trafficLight->processor();
	sleep( 1 );
}

