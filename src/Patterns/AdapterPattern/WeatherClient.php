<?php
/**
 * Created by PhpStorm.
 * User: kwawrzecki
 * Date: 26/03/2017
 * Time: 14:37
 */

namespace Patterns\AdapterPattern;
use Patterns\AdapterPattern\WeatherAdapterInterface;


class WeatherClient
{
    public $weatherAdapter;

    public function __construct(WeatherAdapterInterface $weatherAdapter)
    {
        $this->weatherAdapter = $weatherAdapter;
    }

    public function forecast()
    {
        return $this->weatherAdapter->getForecast();
    }

}