<?php

namespace Tests\Unit;

use App\Services\CovidStatsAPI;
use PHPUnit\Framework\TestCase;

class CovidStatsAPITest extends TestCase
{
    private array $responseArray = [
        0 => [
            "country" => "Test country",
            "code" => "TC",
            "confirmed" => 111111,
            "recovered" => 222222,
            "critical" => 0,
            "deaths" => 111,
            "latitude" => 40.000000,
            "longitude" => 40.000000,
            "lastChange" => "2020-01-01T00:00:00+01:00",
            "lastUpdate" => "2020-01-01T00:00:00+01:00",
        ]
    ];

    /**
     * @test
     * @covers \App\Services\CovidStatsAPI::handleResponseData
     */
    public function data_is_handled_properly()
    {
        $covidStatsAPI = new CovidStatsAPI();

        $result = $covidStatsAPI->handleResponseData($this->responseArray);

        $this->assertNotEquals([], $result);
        $this->assertEquals([
            'confirmed' => 111111,
            'recovered' => 222222,
            'critical' => 0,
            'deaths' => 111,
        ], $result);
    }
}
