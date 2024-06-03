<?php

namespace Builder\TreeCreatorBuilder;

use Contracts\Trees\Trees as Trees;
use Exception;

final class TreeCreatorBuilder implements Trees
{
    /**
     * Плоды
     * @var array $fruits
     */
    public $fruits;

    /**
     * Тип дерева
     */
    public $typeTree;

     /**
     * Уникальный идентификатор дерева
     */
    public $numberTree;

    public function getObject()
    {
        return $this;
    }
    
    
    // int $minCountFruits, int $maxCountFruits, int $minScalesFruits, int $maxScalesFruits Для написания теста убрал типы
    public function setFruits($minCountFruits, $maxCountFruits, $minScalesFruits, $maxScalesFruits)
    {

        $minCountFruits == null ? throw new Exception : null;
        $maxCountFruits == null ? throw new Exception : null;
        $minScalesFruits == null ? throw new Exception : null;
        $maxScalesFruits == null ? throw new Exception : null;

        $fruitCount = rand($minCountFruits, $maxCountFruits);

        $fruitsArray = [];
        for ($i = 0; $i <= $fruitCount; $i++) {
            array_push($fruitsArray, $this->getScaleFruit($minScalesFruits, $maxScalesFruits));
        }

        $this->fruits = $fruitsArray;
    }

    public function setTreeType(string $typeTree)
    {
        $this->typeTree = $typeTree;
    }

    public function setTreeUniqueNumber()
    {
        $this->numberTree = $this->generate_uuid();
    }

    /**
     * Определяем вес плодов
     * @param int $minScalesFruits
     * @param int $maxScalesFruits
     * @return int
     */
    private function getScaleFruit(int $minScalesFruits, int $maxScalesFruits)
    {
        return rand($minScalesFruits, $maxScalesFruits);
    }

    private function generate_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
           
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
    
            mt_rand( 0, 0xffff ),
           
            mt_rand( 0, 0x0fff ) | 0x4000,
    
            mt_rand( 0, 0x3fff ) | 0x8000,
    
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

}
