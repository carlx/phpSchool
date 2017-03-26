<?php
namespace Patterns\CommandPattern;
/**
 * Created by PhpStorm.
 * User: kwawrzecki
 * Date: 25/03/2017
 * Time: 15:23
 */
class ReloadCommand implements CommandInterface
{
    private $gun;

    public function __construct(Gun $gun)
    {
        $this->gun = $gun;
    }

    public function execute(): void
    {
        $this->gun->reload();
    }

}