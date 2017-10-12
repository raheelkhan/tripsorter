<?php

namespace TripSorter\BoardingPass;

class Airline extends BoardingPass
{
    public function __construct(array $tripDetails)
    {
        parent::__construct($tripDetails);
    }
}
