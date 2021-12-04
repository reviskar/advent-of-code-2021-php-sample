<?php

namespace App\day01;

/**
 * Created by Rene Viskar
 */
class MassCalculatorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * For a mass of 12, divide by 3 and round down to get 4, then subtract 2 to get 2.
     * For a mass of 14, dividing by 3 and rounding down still yields 4, so the fuel required is also 2.
     * For a mass of 1969, the fuel required is 654.
     * For a mass of 100756, the fuel required is 33583.
     */
    public function testCalculateNeededFuelForMass()
    {
        $massCalculator = new MassCalculator();

        $this->assertEquals(2, $massCalculator->calculateNeededFuelForMass(12));
        $this->assertEquals(2, $massCalculator->calculateNeededFuelForMass(14));
        $this->assertEquals(654, $massCalculator->calculateNeededFuelForMass(1969));
        $this->assertEquals(33583, $massCalculator->calculateNeededFuelForMass(100756));
    }

    /**
     * A module of mass 14 requires 2 fuel.
     *  This fuel requires no further fuel (2 divided by 3 and rounded down is 0,
     *  which would call for a negative fuel), so the total fuel required is still just 2.
     * At first, a module of mass 1969 requires 654 fuel.
     *  Then, this fuel requires 216 more fuel (654 / 3 - 2).
     *  216 then requires 70 more fuel, which requires 21 fuel,
     *  which requires 5 fuel, which requires no further fuel.
     *  So, the total fuel required for a module of mass 1969 is 654 + 216 + 70 + 21 + 5 = 966.
     * The fuel required by a module of mass 100756 and its fuel is:
     *  33583 + 11192 + 3728 + 1240 + 411 + 135 + 43 + 12 + 2 = 50346.
     */
    public function testCalculateNeededFuelForMassRecursive()
    {
        $massCalculator = new MassCalculator();
        $this->assertEquals(50346, $massCalculator->calculateNeededFuelForMassRecursive(100756));
        $massCalculator = new MassCalculator();
        $this->assertEquals(966, $massCalculator->calculateNeededFuelForMassRecursive(1969));
        $massCalculator = new MassCalculator();
        $this->assertEquals(2, $massCalculator->calculateNeededFuelForMassRecursive(14));
        $massCalculator = new MassCalculator();
        $this->assertEquals(2, $massCalculator->calculateNeededFuelForMassRecursive(12));
    }


    public function testFull()
    {
        $input = \App\helpers\InputFileReader::readFile(__DIR__ . '/input.txt');

        $total = 0;

        foreach ($input as $item) {
            $massCalculator = new MassCalculator();
            $total += $massCalculator->calculateNeededFuelForMass($item);
        }

        $this->assertEquals(3398090, $total);


        $input = \App\helpers\InputFileReader::readFile(__DIR__ . '/input.txt');

        $total = 0;

        foreach ($input as $item) {
            $massCalculator = new MassCalculator();
            $total += $massCalculator->calculateNeededFuelForMassRecursive($item);
        }
        $this->assertEquals(5094261, $total);
    }
}

