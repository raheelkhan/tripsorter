<?php

use PHPUnit\Framework\TestCase;
use TripSorter\BoardingPass\Airline;
use TripSorter\Builders\AirlineBuilder;

class AirlineBuilderTest extends TestCase
{
    public function testShouldBuildCorrectTrip()
    {
        $airline = new Airline([
            'Departure' => 'Gerona Airport',
            'Arrival' => 'Stockholm',
            'Flight' => 'SK455',
            'Gate' => '45B',
            'Seat' => '3A',
            'Baggage' => '334'
        ]);

        $airlineBuider = new AirlineBuilder($airline, false);
        $expected = "From Gerona Airport take flight SK455 to Stockholm. Gate 45B, Seat 3A. Baggage drop at ticket counter 334.\n";
        $this->assertEquals($expected, $airlineBuider->build());
    }
}