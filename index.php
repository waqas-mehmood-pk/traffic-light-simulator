<?php use TrafficLight\TrafficLight;

include "TrafficLight/TrafficLight.php";

$trafficLight = new TrafficLight();
while ( true ) {
	echo $trafficLight->stateInfo(). "\n";
	$trafficLight->processor();
	sleep( 1 );
}

