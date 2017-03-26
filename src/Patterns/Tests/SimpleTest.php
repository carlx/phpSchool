<?php
use PHPUnit\Framework\TestCase;
use Patterns\CommandPattern\Gun;
use Patterns\CommandPattern\Shooter;
use Patterns\CommandPattern\ShootCommand;

use Patterns\StrategyPattern\Duck;
use Patterns\StrategyPattern\FlyAlgorithm;
use Patterns\StrategyPattern\FlyAlgorithm2;

use Patterns\AdapterPattern\GoogleWhetherService;
use Patterns\AdapterPattern\GoogleWhetherAdapter;
use Patterns\AdapterPattern\WeatherClient;
use Patterns\AdapterPattern\AmazonWhetherService;
use Patterns\AdapterPattern\AmazonWhetherAdapter;

final class SimpleTest extends TestCase {
	

	public function testEnvWorks() {
		$this->assertEquals(true, true);	
	}

	public function testCommandPattern()
    {
        $gun = new Gun();
        $shooter = new Shooter();

        $shooter->addCommand(new ShootCommand($gun));

        $shooter->runCommands();

        $this->assertEquals(0, $gun->getNoOfBullets());

    }

    public function testStrategyPattern()
    {
        $duck = new Duck(new FlyAlgorithm());
        $this->assertEquals('fly hi', $duck->fly());
        $duck2 = new Duck(new FlyAlgorithm2());
        $this->assertEquals('fly low', $duck2->fly());
    }

    public function testAdapterPattern()
    {
        $googleWeatherService = new GoogleWhetherService();
        $adapter = new GoogleWhetherAdapter($googleWeatherService);
        $client = new WeatherClient($adapter);

        $this->assertEquals('google', $client->forecast());

        $amazonWeatherService = new AmazonWhetherService();
        $adapter = new AmazonWhetherAdapter($amazonWeatherService);
        $client = new WeatherClient($adapter);

        $this->assertEquals('amazon', $client->forecast());
    }

}