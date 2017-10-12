<?php

namespace TripSorter\BoardingPass;

class Bus extends BoardingPass
{
    public function __construct(array $tripDetails)
    {
        parent::__construct($tripDetails);
    }
}
