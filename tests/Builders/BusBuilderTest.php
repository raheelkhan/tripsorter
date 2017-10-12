<?php

use PHPUnit\Framework\TestCase;
use TripSorter\BoardingPass\Bus;
use TripSorter\Builders\BusBuilder;

class BusBuilderTest extends TestCase
{
    public function testShouldBuildCorrectTrip()
    {
        $bus = new Bus([
            'Departure' => 'Barcelona',
            'Arrival' => 'Gerona Airport',
        ]);

        $busBuider = new BusBuilder($bus, false);
        $expected = "Take the airport bus from Barcelona to Gerona Airport. No seat assignment.\n";
        $this->assertEquals($expected, $busBuider->build());
    }
}