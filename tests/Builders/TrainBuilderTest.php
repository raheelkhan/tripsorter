<?php

use PHPUnit\Framework\TestCase;
use TripSorter\BoardingPass\Train;
use TripSorter\Builders\TrainBuilder;

class TrainBuilderTest extends TestCase
{
    public function testShouldBuildCorrectTrip()
    {
        $train = new Train([
            'Departure' => 'Madrid',
            'Arrival' => 'Barcelona',
            'Seat' => '45B',
            'Train' => '78A'
        ]);

        $trainBuider = new TrainBuilder($train, false);
        $expected = "Take train 78A from Madrid to Barcelona. Sit in 45B.\n";
        $this->assertEquals($expected, $trainBuider->build());
    }
}