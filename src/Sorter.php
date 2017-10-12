<?php

namespace TripSorter;


use InvalidArgumentException;

class Sorter
{
    /**
     * @param array $unSorted
     * @return array
     */
    public function sort(array $unSorted) : array
    {
        if (count($unSorted) < 1) {
            throw new InvalidArgumentException();
        }
        $sorted = [];
        $lastBoardingPass = $this->getLastBoardingPass($unSorted);
        $sorted[] = $unSorted[$lastBoardingPass];
        array_splice($unSorted, $lastBoardingPass, 1);
        while (count($unSorted) > 0) {
            $this->getPreviousBoardingPass($unSorted, $sorted);
        }

        return $sorted;
    }

    /**
     * @param array $unSorted
     * @return int
     */
    private function getLastBoardingPass(array $unSorted) : int
    {
        $count = count($unSorted) - 1;
        for ($i = 0; $i <= $count; $i++) {
            for ($j = 0; $j <= $count; $j++) {
                if (!isset($unSorted[$j]['Arrival']) || !isset($unSorted[$j]['Departure'])) {
                    throw new InvalidArgumentException();
                }
                if ($unSorted[$i]['Arrival'] === $unSorted[$j]['Departure'])
                    break;
                if ($j === $count)
                    break 2;
            }
        }

        return $i;
    }

    /**
     * @param array $unSorted
     * @param array $sorted
     * @throws InvalidArgumentException
     */
    private function getPreviousBoardingPass(array &$unSorted, array &$sorted)
    {
        foreach($unSorted as $order => $boardingPass) {
            if (!isset($unSorted[$order]['Departure']) || !isset($unSorted[$order]['Arrival'])) {
                throw new InvalidArgumentException();
            }
            if ($unSorted[$order]['Arrival'] === $sorted[0]['Departure']) {
                array_unshift($sorted, $unSorted[$order]);
                unset($unSorted[$order]);
            }
        }
    }
}