<?php

namespace TripSorter\Builders;

use TripSorter\BoardingPass\Airline;

class AirlineBuilder implements BuilderInterface
{
    /**
     * @var Airline
     */
    private $airline;
    /**
     * @var bool
     */
    private $isLastTrip;

    /**
     * AirlineBuilder constructor.
     * @param Airline $airline
     * @param bool $isLastTrip
     */
    public function __construct(Airline $airline, bool $isLastTrip)
    {
        $this->airline = $airline;
        $this->isLastTrip = $isLastTrip;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        $flight = $this->airline->offsetExists('Flight') ? ' ' . $this->airline['Flight'] : '';
        $instructions = 'From ' . $this->airline['Departure'] . ' take flight' . $flight .' to ' .
            $this->airline['Arrival'] . '.';

        if ($this->airline->offsetExists('Gate')) {
            $instructions .= ' Gate ' . $this->airline['Gate'] . ',';
        }

        if ($this->airline->offsetExists('Seat')) {
            $instructions .= ' Seat ' . $this->airline['Seat'] . '.';
        }

        if ($this->airline->offsetExists('Baggage') && !$this->isLastTrip) {
            $instructions .= ' Baggage drop at ticket counter ' . $this->airline['Baggage'] . '.';
        }

        if ($this->isLastTrip) {
            $instructions .= ' Baggage will we automatically transferred from your last leg.';
        }

        return $instructions . "\n";
    }
}

