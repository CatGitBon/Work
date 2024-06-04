<?php
namespace Desktop\garden;

use Builder\Director\TreeCreatorDirector\TreeCreatorDirector;
use Builder\TreeCreatorBuilder\TreeCreatorBuilder;
use Objects\Robot\RobotCollector;
use Objects\Robot\RobotScales;

final class InitProgram
{
    private const apple = 10;
    private const pear = 15;

    /**
     * @var array $appleTrees
     */
    private $appleTrees = [];

    /**
     * @var array $appleTrees
     */
    private $pearTrees = [];

    public function main()
    {
        
        $builder = new TreeCreatorBuilder;
        $director = new TreeCreatorDirector($builder);

        // Создание деревьев
        for($i=0; $i < self::apple; $i++){
            $directorApple = clone($director);
            array_push($this->appleTrees, $directorApple->createAppleTree());
        }
        for($i=0; $i < self::pear; $i++){
            $directorPear = clone($director);
            array_push($this->pearTrees, $directorPear->createPearTree());
        }

        // Сборка плодов
        $robotColector = new RobotCollector();
        $finalArray = array_merge($this->appleTrees, $this->pearTrees);
        $container = $robotColector->fruitPicking($finalArray);

        // Подсчет веса
        // Вывод на экран
        $robotScales = new RobotScales($container);
        $totalWeight = $robotScales->calculatingTheTotalWeightOfFruits();
        $totalWeightEachType = $robotScales->calculatingTheTotalWeightOfFruitsOfEachType();
        $heaviestApple = $robotScales->getTheHeaviestApple();

    }
}



