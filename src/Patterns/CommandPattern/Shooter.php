<?php
namespace Patterns\CommandPattern;
/**
 * Created by PhpStorm.
 * Command Invoker Class
 * User: kwawrzecki
 * Date: 25/03/2017
 * Time: 13:29
 */
class Shooter
{

    protected $commandList = [];

    public function addCommand(CommandInterface $command)
    {
        array_push($this->commandList, $command);
    }

    public function runCommands()
    {
        foreach ($this->commandList as $command) {
            $command->execute();
        }
    }

}