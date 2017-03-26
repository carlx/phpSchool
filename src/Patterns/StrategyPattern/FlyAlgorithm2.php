<?php
namespace Patterns\StrategyPattern;
use Patterns\StrategyPattern\FlyStrategy;

/**
 * Created by PhpStorm.
 * User: kwawrzecki
 * Date: 26/03/2017
 * Time: 10:54
 */
class FlyAlgorithm2 implements FlyStrategy
{
    public function fly()
    {
        return 'fly low';
    }
}