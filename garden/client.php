<?php
use Desktop\garden\InitProgram;

$dir = str_replace('\\', '/', __DIR__);


require_once $dir . '/InitProgram.php';
require_once $dir . '/Contracts/Trees.php';
require_once $dir . '/Builder/TreeCreatorBuilder.php';
require_once $dir . '/Builder/Director/TreeCreatorDirector.php';
require_once $dir . '/Objects/Robot/RobotCollector.php';
require_once $dir . '/Objects/Robot/RobotScales.php';

$object = new InitProgram();
$object->main();
?>
