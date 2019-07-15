<?php use TrafficLight\TrafficLight;

include "TrafficLight/TrafficLight.php";

$trafficLight = new TrafficLight();
while ( true ) {
	$trafficLight->processor();
	echo $trafficLight->stateInfo();
	sleep( 1 );
}

