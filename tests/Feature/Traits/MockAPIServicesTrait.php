<?php

namespace Tests\Feature\Traits;

use App\Services\CovidStatsAPI;
use App\Services\HotelsAPI;
use App\Services\WeatherAPI;
use Mockery\MockInterface;

trait MockAPIServicesTrait
{
    public function mockAPIServices()
    {
        $this->mock(HotelsAPI::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')
                ->andReturn([]);
        });

        $this->mock(WeatherAPI::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')
                ->andReturn([]);
        });

        $this->mock(CovidStatsAPI::class, function (MockInterface $mock) {
            $mock->shouldReceive('get')
                ->andReturn([]);
        });
    }
}