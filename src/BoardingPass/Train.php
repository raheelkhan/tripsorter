<?php

namespace TripSorter\BoardingPass;

class Train extends BoardingPass
{
    public function __construct(array $tripDetails)
    {
        parent::__construct($tripDetails);
    }
}
