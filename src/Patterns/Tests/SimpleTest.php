<?php
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
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
use Patterns\SingletonPattern\Singleton;

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

    public function testWithProphecy()
    {
        $expected = '123';
        $amazonService = $this->prophesize(AmazonWhetherService::class);
        $amazonService->getAmazonWhether()->willReturn($expected);
        $adapter = new AmazonWhetherAdapter($amazonService->reveal());
        $client = new WeatherClient($adapter);
        $this->assertEquals($expected, $client->forecast());

    }

    public function testSingleton()
    {
        $instance1 = Singleton::getInstance();
        $instance2 = Singleton::getInstance();
        
        $this->assertEquals($instance1, $instance2);
    }

}