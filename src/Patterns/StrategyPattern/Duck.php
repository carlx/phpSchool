<?php
namespace Patterns\StrategyPattern;
use Patterns\StrategyPattern\FlyStrategy;
/**
 * Created by PhpStorm.
 * User: kwawrzecki
 * Date: 26/03/2017
 * Time: 10:52
 */
class Duck
{
    private $flyStrategy;

    public function __construct(FlyStrategy $flyStrategy)
    {
        $this->flyStrategy = $flyStrategy;
    }

    public function fly()
    {
        return $this->flyStrategy->fly();
    }

}