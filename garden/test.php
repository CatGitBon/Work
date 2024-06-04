<?php

use Desktop\garden\Tests\Unit\TestRobot;
use Desktop\garden\Tests\Unit\TestBuilder;



$dir = str_replace('\\', '/', __DIR__);

require_once $dir . '/Tests/Unit/TestRobot.php';
require_once $dir . '/Tests/Unit/TestBuilder.php';
require_once $dir . '/InitProgram.php';
require_once $dir . '/Contracts/Trees.php';
require_once $dir . '/Builder/TreeCreatorBuilder.php';
require_once $dir . '/Builder/Director/TreeCreatorDirector.php';
require_once $dir . '/Objects/Robot/RobotCollector.php';
require_once $dir . '/Objects/Robot/RobotScales.php';

$TestRobot = new TestRobot();
$TestBuilder = new TestBuilder();


$TestRobot->test();
$TestBuilder->test();
