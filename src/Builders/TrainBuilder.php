<?php

namespace TripSorter\Builders;

use TripSorter\BoardingPass\Train;

class TrainBuilder implements BuilderInterface
{
    /**
     * @var Train
     */
    private $train;
    /**
     * @var bool
     */
    private $isLastTrip;

    /**
     * TrainBuilder constructor.
     * @param Train $train
     * @param bool $isLastTrip
     */
    public function __construct(Train $train, bool $isLastTrip)
    {
        $this->train = $train;
        $this->isLastTrip = $isLastTrip;
    }

    public function build(): string
    {
        $train = $this->train->offsetExists('Train') ? ' ' . $this->train['Train'] : '';
        $instructions = 'Take train' .  $train . ' from ' . $this->train['Departure'] . ' to ' .
            $this->train['Arrival'] . '.';

        if ($this->train->offsetExists('Seat')) {
            $instructions .= ' Sit in ' . $this->train['Seat'] . '.';
        } else {
            $instructions .= ' No seat assignment.';
        }

        return $instructions . "\n";
    }
}