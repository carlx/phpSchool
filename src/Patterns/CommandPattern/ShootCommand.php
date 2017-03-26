<?php
namespace Patterns\CommandPattern;
use Patterns\CommandPattern\CommandInterface;
/**
 * Created by PhpStorm.
 * User: kwawrzecki
 * Date: 25/03/2017
 * Time: 15:23
 */
class ShootCommand implements CommandInterface
{
    private $gun;

    public function __construct(Gun $gun)
    {
        $this->gun = $gun;
    }

    public function execute()
    {
        $this->gun->shoot();
    }

}