<?php

namespace TripSorter;

use TripSorter\BoardingPass\Airline;
use TripSorter\BoardingPass\Bus;
use TripSorter\BoardingPass\Train;
use Exception;
use TripSorter\Builders\AirlineBuilder;
use TripSorter\Builders\BuilderInterface;
use TripSorter\Builders\BusBuilder;
use TripSorter\Builders\TrainBuilder;

class JourneyBuilder
{
    /**
     * @var array
     */
    private $boardingPasses;

    /**
     * JourneyBuilder constructor.
     * @param array $boardingPasses
     */
    public function __construct(array $boardingPasses)
    {
        $this->boardingPasses = $boardingPasses;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function build(): string
    {
        $journey = "JOURNEY DETAILS: \n";
        foreach ($this->boardingPasses as $boardingPass) {
            switch (get_class($boardingPass)){
                case Airline::class:
                    $builder = new AirlineBuilder($boardingPass, !next($this->boardingPasses));
                    break;
                case Train::class:
                    $builder = new TrainBuilder($boardingPass, !next($this->boardingPasses));
                    break;
                case Bus::class:
                    $builder = new BusBuilder($boardingPass, !next($this->boardingPasses));
                    break;
                default:
                    throw new Exception('No boarding pass provided to build journey');
            }

            $journey .= $this->getTripInstruction($builder);
        }

        return $journey;
    }

    /**
     * @param BuilderInterface $builder
     * @return string
     */
    private function getTripInstruction(BuilderInterface $builder)
    {
        return $builder->build();
    }
}
