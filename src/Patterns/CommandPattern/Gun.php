<?php
namespace Patterns\CommandPattern;
/**
 * Created by PhpStorm.
 * User: kwawrzecki
 * Date: 25/03/2017
 * Time: 13:28
 */
class Gun
{
    public $bullets;

    public function __construct()
    {
        $this->bullets = 1;
    }

    public function shoot()
    {
        $this->bullets--;
    }

    public function reload()
    {
        $this->bullets++;
    }

    public function getNoOfBullets()
    {
        return $this->bullets;
    }

}