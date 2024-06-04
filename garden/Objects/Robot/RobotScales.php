<?php

namespace Objects\Robot;

final class RobotScales
{

    private $container;

    public function __construct(array $container)
    {
        $this->container = $container;
    }


    /**
     * Подсчет вес собранных фруктов каждого вида
     */
    public function calculatingTheTotalWeightOfFruitsOfEachType()
    {
        $fruits = [];

        // Разбиваем массив на типы
        foreach ($this->container as $tree) {

            $fruitWeight = 0;
            // Подсчет веса для каждого дерева
            foreach ($tree['fruits'] as $weight) {
                $fruitWeight = $fruitWeight + $weight;
            }

            $fruits[$tree['typeTree']] += $fruitWeight;
        }

        return $fruits;
    }

    /**
     * Подсчет общего кол-во плодов
     */
    public function calculatingTheTotalWeightOfFruits(): int
    {
        $fruits = 0;

        foreach ($this->container as $tree) {
            foreach ($tree['fruits'] as $weight) {
                $fruits = $fruits + $weight;
            }
        }

        return $fruits;
    }

    /**
     * Выбор самого тяжелого яблока
     */
    public function getTheHeaviestApple()
    {
        $appleArray = [];

        foreach($this->container as $tree)
        {
            if($tree['typeTree'] === 'apple'){
                array_push($appleArray, max($tree['fruits']));
            }
        }

        return max($appleArray);

        // return max($fruitWeightArray['apple']);
    }
}
