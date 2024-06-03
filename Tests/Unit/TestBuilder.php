<?php

namespace Desktop\garden\Tests\Unit;

use Builder\TreeCreatorBuilder\TreeCreatorBuilder;
use Exception;

final class TestBuilder
{
    public function test(){
        $this->testSetFruits();
    }

    private function testSetFruits()
    {
        $builder = new TreeCreatorBuilder();

        try
        {
            $builder->setFruits(0,0,null,0);
        }catch(Exception $error){
            $this->echoMessage('OK', 'Тестирование на отсутствие аргументов для функции');
            return;
        }
    }

    private function echoMessage($typeMessage, $message){
        echo $typeMessage . '  ' . $message;   
    }
}