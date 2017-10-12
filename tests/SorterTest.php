<?php

use PHPUnit\Framework\TestCase;
use TripSorter\Sorter;

class SorterTest extends TestCase
{
    public function testShouldReturnSortedTrip()
    {
        $unSorted = [
            [
                'Departure' => 'Pakistan',
                'Arrival' => 'Dubai'
            ],
            [
                'Departure' => 'Dubai',
                'Arrival' => 'India'
            ],
            [
                'Departure' => 'London',
                'Arrival' => 'Malaysia'
            ],
            [
                'Departure' => 'India',
                'Arrival' => 'London'
            ],
        ];
        $sorted = [
            [
                'Departure' => 'Pakistan',
                'Arrival' => 'Dubai'
            ],
            [
                'Departure' => 'Dubai',
                'Arrival' => 'India'
            ],
            [
                'Departure' => 'India',
                'Arrival' => 'London'
            ],
            [
                'Departure' => 'London',
                'Arrival' => 'Malaysia'
            ],
        ];

        $tripSorter = new Sorter();
        $this->assertEquals($sorted, $tripSorter->sort($unSorted));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldThrowInvalidArgumentExceptionWithWongArray()
    {
        $unSorted = [
            [
                'Foo' => 'Bar',
                'Arrival' => 'Dubai'
            ],
            [
                'Departure' => 'Pakistan',
                'Baz' => 'Qux'
            ]
        ];

        (new Sorter())->sort($unSorted);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldThrowInvalidArgumentExceptionWithEmptyArray()
    {
        (new Sorter())->sort([]);
    }
}