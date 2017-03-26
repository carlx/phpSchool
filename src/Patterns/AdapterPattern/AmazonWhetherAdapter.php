<?php
namespace Patterns\AdapterPattern;
use Patterns\AdapterPattern\AmazonWhetherService;

/**
 * Created by PhpStorm.
 * User: kwawrzecki
 * Date: 26/03/2017
 * Time: 14:35
 */
class AmazonWhetherAdapter implements WeatherAdapterInterface
{
    public $amazonWeatherService;

    public function __construct(AmazonWhetherService $amazonWeatherService)
    {
        $this->amazonWeatherService = $amazonWeatherService;
    }

    public function getForecast()
    {
        return $this->amazonWeatherService->getAmazonWhether();
    }
}