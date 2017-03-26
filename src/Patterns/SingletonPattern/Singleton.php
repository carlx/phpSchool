<?php
/**
 * Created by PhpStorm.
 * User: kwawrzecki
 * Date: 26/03/2017
 * Time: 19:44
 */

namespace Patterns\SingletonPattern;


class Singleton
{

    public static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if(empty(self::$instance)) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }



}