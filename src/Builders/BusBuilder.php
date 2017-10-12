<?php

namespace TripSorter\Builders;

use TripSorter\BoardingPass\Bus;

class BusBuilder implements BuilderInterface
{
    /**
     * @var Bus
     */
    private $bus;
    /**
     * @var bool
     */
    private $isLastTrip;

    /**
     * BusBuilder constructor.
     * @param Bus $bus
     * @param bool $isLastTrip
     */
    public function __construct(Bus $bus, bool $isLastTrip)
    {
        $this->bus = $bus;
        $this->isLastTrip = $isLastTrip;
    }

    public function build(): string
    {
        $instructions = 'Take the airport bus from ' . $this->bus['Departure'] . ' to ' . $this->bus['Arrival'] . '.';

        if ($this->bus->offsetExists('Seat')) {
            $instructions .= ' Sit in ' . $this->bus['Seat'] . '.';
        } else {
            $instructions .= ' No seat assignment.';
        }

        return $instructions . "\n";
    }
}