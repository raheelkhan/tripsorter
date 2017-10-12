<?php
include "vendor/autoload.php";

use TripSorter\BoardingPass\Airline;
use TripSorter\BoardingPass\Bus;
use TripSorter\BoardingPass\Train;
use TripSorter\JourneyBuilder;
use TripSorter\Sorter;

$boardingPasses = [];
$boardingPasses[] = new Airline(
    [
        'Departure' => 'Gerona Airport',
        'Arrival' => 'Stockholm',
        'Flight' => 'SK455',
        'Gate' => '45B',
        'Seat' => '3A',
        'Baggage' => '334'
    ]
);
$boardingPasses[] = new Airline(
    [
        'Departure' => 'Stockholm',
        'Arrival' => 'New York JFK',
        'Flight' => 'SK22',
        'Gate' => 22,
        'Seat' => '7b'
    ]
);
$boardingPasses[] = new Train(
    [
        'Departure' => 'Madrid',
        'Arrival' => 'Barcelona',
        'Seat' => '45B',
        'Train' => '78A'
    ]
);
$boardingPasses[] = new Bus(
    [
        'Departure' => 'Barcelona',
        'Arrival' => 'Gerona Airport',
    ]
);

$sortedTrip = (new Sorter())->sort($boardingPasses);
$journey = (new JourneyBuilder($sortedTrip))->build();
echo $journey;
