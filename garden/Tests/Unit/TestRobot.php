<?php

namespace Desktop\garden\Tests\Unit;

use Objects\Robot\RobotScales;

final class TestRobot
{
    public function test()
    {
        $this->testCalculatingTheTotalWeightOfFruitsOfEachType();
        $this->testCalculatingTheTotalWeightOfFruits();
        $this->testGetTheHeaviestApple();
    }

    private function testCalculatingTheTotalWeightOfFruitsOfEachType()
    {
        /**
         * Начальные данные
         * @var array $trees 
         */
        $trees = [];

         /**
         * Ожидаемые данные
         * @var array $trees 
         */
        $expected = [];

        array_push($trees, ['typeTree' => 'apple', 'numberTree' => 1, 'fruits' => [100, 200, 300]]);
        array_push($trees, ['typeTree' => 'apple', 'numberTree' => 2, 'fruits' => [120, 220, 320]]);
        array_push($trees, ['typeTree' => 'apple', 'numberTree' => 3, 'fruits' => [110, 270, 350]]);
        array_push($trees, ['typeTree' => 'pear', 'numberTree' => 4, 'fruits' => [50, 80, 120]]);
        array_push($trees, ['typeTree' => 'pear', 'numberTree' => 5, 'fruits' => [100, 200, 60]]);
        array_push($trees, ['typeTree' => 'pear', 'numberTree' => 6, 'fruits' => [100, 65, 100]]);


        $expected['apple'] = 1990;
        $expected['pear'] = 875;

        $robotScales = new RobotScales($trees);

        $result = $robotScales->calculatingTheTotalWeightOfFruitsOfEachType();

        $this->assertEquals($result, $expected, 'Тестирование взвешивания отдельно каждой категории фруктов');
    }

    private function testCalculatingTheTotalWeightOfFruits()
    {
        /**
         * Начальные данные
         * @var array $trees 
         */
        $trees = [];

         /**
         * Ожидаемые данные
         * @var array $trees 
         */
        $expected = [];

        array_push($trees, ['typeTree' => 'apple', 'numberTree' => 1, 'fruits' => [100, 200, 300]]);
        array_push($trees, ['typeTree' => 'apple', 'numberTree' => 2, 'fruits' => [120, 220, 320]]);
        array_push($trees, ['typeTree' => 'apple', 'numberTree' => 3, 'fruits' => [110, 270, 350]]);
        array_push($trees, ['typeTree' => 'pear', 'numberTree' => 4, 'fruits' => [50, 80, 120]]);
        array_push($trees, ['typeTree' => 'pear', 'numberTree' => 5, 'fruits' => [100, 200, 60]]);
        array_push($trees, ['typeTree' => 'pear', 'numberTree' => 6, 'fruits' => [100, 65, 100]]);


        $expected = 2865;

        $robotScales = new RobotScales($trees);

        $result = $robotScales->calculatingTheTotalWeightOfFruits();

        $this->assertEquals($result, $expected, 'Тестирование определение общего веса фруктов со всех деревьев');
    }

    private function testGetTheHeaviestApple()
    {
        /**
         * Начальные данные
         * @var array $trees 
         */
        $trees = [];

         /**
         * Ожидаемые данные
         * @var array $trees 
         */
        $expected = [];

        array_push($trees, ['typeTree' => 'apple', 'numberTree' => 1, 'fruits' => [100, 200, 300]]);
        array_push($trees, ['typeTree' => 'apple', 'numberTree' => 2, 'fruits' => [120, 220, 320]]);
        array_push($trees, ['typeTree' => 'apple', 'numberTree' => 3, 'fruits' => [110, 270, 350]]);
        array_push($trees, ['typeTree' => 'pear', 'numberTree' => 4, 'fruits' => [50, 80, 120]]);
        array_push($trees, ['typeTree' => 'pear', 'numberTree' => 5, 'fruits' => [100, 200, 60]]);
        array_push($trees, ['typeTree' => 'pear', 'numberTree' => 6, 'fruits' => [100, 65, 100]]);


        $expected = 350;

        $robotScales = new RobotScales($trees);
        $result = $robotScales->getTheHeaviestApple();

        $this->assertEquals($result, $expected, 'Тестирование определение самого тяжелого яблока');
    }

    private function assertEquals($result, $expected, string $message = '')
    {
        if ($result === $expected) {
            echo "OK: $message\n";
        } else {
            echo "FAIL: $message\nExpected: " . json_encode($expected) . "\nActual: " . json_encode($result) . "\n";
        }
    }
}
