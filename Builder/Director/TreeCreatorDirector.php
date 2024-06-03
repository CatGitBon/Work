<?php

namespace Builder\Director\TreeCreatorDirector;

use Builder\TreeCreatorBuilder\TreeCreatorBuilder;

final class TreeCreatorDirector
{

    private $tree;

    private $treeClone;

    public function __construct(TreeCreatorBuilder $tree)
    {
        $this->tree = $tree;
    }

    public function init()
    {
        $this->treeClone = clone ($this->tree);
    }

    /**
     * Создание яблони
     */
    public function createAppleTree()
    {
        $this->init();
        $this->treeClone->setTreeUniqueNumber();
        $this->treeClone->setTreeType('apple');
        $this->treeClone->setFruits(40, 50, 150, 180);

        return $this->treeClone->getObject();
    }

    /**
     * Создание груши
     */
    public function createPearTree()
    {
        $this->init();
        $this->treeClone->setTreeUniqueNumber();
        $this->treeClone->setTreeType('pear');
        $this->treeClone->setFruits(0, 20, 130, 170);

        return $this->treeClone->getObject();
    }
}
