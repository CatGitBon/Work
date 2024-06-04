<?php

namespace Objects\Robot;

final class RobotCollector
{

    // Можно сделать еще, чтобы плоды исчезали с деревьев
    public function fruitPicking(array $trees): array
    {
        $array = [];
        foreach ($trees as $tree) {
            array_push($array, ['typeTree' => $tree->typeTree, 'numberTree' => $tree->numberTree, 'fruits' => $tree->fruits]);
        }


        return $array;
    }
}
