<?php

namespace Tests\Unit;

use App\Services\HotelsAPI;
use PHPUnit\Framework\TestCase;

class HotelsAPITest extends TestCase
{
    private array $responseArray = [
        "term" => "test city",
        "moresuggestions" => 0,
        "autoSuggestInstance" => null,
        "trackingID" => "c561a156a156f156fas56af6fa65",
        "misspellingfallback" => false,
        "suggestions" => [
            0 => [
                "group" => "CITY_GROUP",
                "entities" => [
                    0 => [
                        "geoId" => "16156651",
                        "destinationId" => "614156516",
                        "landmarkCityDestinationId" => null,
                        "type" => "CITY",
                        "redirectPage" => "DEFAULT_PAGE",
                        "latitude" => 40.000000000000,
                        "longitude" => 40.000000000000,
                        "searchDetail" => null,
                        "caption" => "Test city in Test country",
                        "name" => "Test city",
                    ],
                ],
            ],
            1 => [
                "group" => "HOTEL_GROUP",
                "entities" => [
                    0 => [
                        "geoId" => "23151351354",
                        "destinationId" => "42412142421",
                        "landmarkCityDestinationId" => null,
                        "type" => "HOTEL",
                        "redirectPage" => "DEFAULT_PAGE",
                        "latitude" => 40.000000000000,
                        "longitude" => 40.000000000000,
                        "searchDetail" => null,
                        "caption" => "Hotel test 1",
                        "name" => "Hotel test 1",
                    ],
                    1 => [
                        "geoId" => "23151351354",
                        "destinationId" => "42412142421",
                        "landmarkCityDestinationId" => null,
                        "type" => "HOTEL",
                        "redirectPage" => "DEFAULT_PAGE",
                        "latitude" => 40.000000000000,
                        "longitude" => 40.000000000000,
                        "searchDetail" => null,
                        "caption" => "Hotel test 2",
                        "name" => "Hotel test 2",
                    ],
                    2 => [
                        "geoId" => "23151351354",
                        "destinationId" => "42412142421",
                        "landmarkCityDestinationId" => null,
                        "type" => "HOTEL",
                        "redirectPage" => "DEFAULT_PAGE",
                        "latitude" => 40.000000000000,
                        "longitude" => 40.000000000000,
                        "searchDetail" => null,
                        "caption" => "Hotel test 3",
                        "name" => "Hotel test 3",
                    ],
                    3 => [
                        "geoId" => "23151351354",
                        "destinationId" => "42412142421",
                        "landmarkCityDestinationId" => null,
                        "type" => "HOTEL",
                        "redirectPage" => "DEFAULT_PAGE",
                        "latitude" => 40.000000000000,
                        "longitude" => 40.000000000000,
                        "searchDetail" => null,
                        "caption" => "Hotel test 4",
                        "name" => "Hotel test 4",
                    ],
                    4 => [
                        "geoId" => "23151351354",
                        "destinationId" => "42412142421",
                        "landmarkCityDestinationId" => null,
                        "type" => "HOUSE",
                        "redirectPage" => "DEFAULT_PAGE",
                        "latitude" => 40.000000000000,
                        "longitude" => 40.000000000000,
                        "searchDetail" => null,
                        "caption" => "House test",
                        "name" => "House test",
                    ],
                ],
            ],
        ],
        "geocodeFallback" => false,
    ];

    /**
     * @test
     * @covers \App\Services\HotelsAPI::handleResponseData
     */
    public function data_is_handled_properly()
    {
        $hotelsAPI = new HotelsAPI();

        $result = $hotelsAPI->handleResponseData($this->responseArray);

        $this->assertNotEquals([], $result);
        $this->assertCount(3, $result);
        $this->assertEquals([
            [
                'name' => 'Hotel test 1',
                'latitude' => 40.000000000000,
                'longitude' => 40.000000000000,
            ],
            [
                'name' => 'Hotel test 2',
                'latitude' => 40.000000000000,
                'longitude' => 40.000000000000,
            ],
            [
                'name' => 'Hotel test 3',
                'latitude' => 40.000000000000,
                'longitude' => 40.000000000000,
            ],
        ], $result);
    }
}
