<?php

namespace Contracts\Trees;

interface Trees
{
    /**
     * Определяем кол-во и вес плодов на дереве
     * @param int $minCountFruits
     * @param int $maxCountFruits
     * @param int $minScalesFruits
     * @param int $maxScalesFruits
     */
    public function setFruits(int $minCountFruits, int $maxCountFruits, int $minScalesFruits, int $maxScalesFruits);

    /**
     * Определяем тип дерева
     * @param string $typeTree
     */
    public function setTreeType(string $typeTree);
}
