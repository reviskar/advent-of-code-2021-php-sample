<?php

namespace App\day01;

class MassCalculator
{
    const DIVIDER = 3;
    const SUBTRACTER = 2;

    /**
     * @var int
     */
    protected $totalMass = 0;

    /**
     * So, for each module mass, calculate its fuel and add it to the total.
     * Then, treat the fuel amount you just calculated as the input mass and repeat the process,
     * continuing until a fuel requirement is zero or negative.
     *
     * @param $mass
     * @return int
     */
    public function calculateNeededFuelForMassRecursive($mass): int
    {
        $result = $this->calculateNeededFuelForMass($mass);
        if ($result < 0) {
            $result = 0;
        }
        $this->totalMass += $result;

        if ($result <= self::SUBTRACTER) {
            return $this->totalMass;
        }
        return $this->calculateNeededFuelForMassRecursive($result);
    }

    /**
     * Fuel required to launch a given module is based on its mass.
     * Specifically, to find the fuel required for a module, take its mass, divide by three, round down, and subtract 2.
     * @param int $mass
     * @return int
     */
    public function calculateNeededFuelForMass(int $mass): int
    {
        return ($this->format($mass/self::DIVIDER)) - self::SUBTRACTER;
    }

    private function format($item): int
    {
        return \floor($item);
    }
}

