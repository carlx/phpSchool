<?php
namespace Patterns\AdapterPattern;
/**
 * Created by PhpStorm.
 * User: kwawrzecki
 * Date: 26/03/2017
 * Time: 14:35
 */
class GoogleWhetherAdapter implements WeatherAdapterInterface
{
    public $googleWeatherService;

    public function __construct(GoogleWhetherService $googleWhetherService)
    {
        $this->googleWeatherService = $googleWhetherService;
    }

    public function getForecast()
    {
        return $this->googleWeatherService->getGoogleWhether();
    }
}