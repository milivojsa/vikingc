<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\TravelGuide;
use Tests\Feature\Traits\MockAPIServicesTrait;
use Tests\TestCase;

class TravelGuideControllerTest extends TestCase
{
    use MockAPIServicesTrait;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockAPIServices();
    }

    /**
     * @test
     */
    public function travel_guide_is_fetched()
    {
        $response = $this->get(route('fetch', [
            'country' => 'Test country',
            'city' => 'Test city',
            'date' => today()->format('Y-m-d'),
        ]));

        $response->assertSee('Test country')
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function travel_guide_and_city_are_created()
    {
        $response = $this->post(route('export'), [
            'country' => 'New country',
            'city' => 'New city',
            'date' => today()->format('Y-m-d'),
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas(City::class, [
            'name' => 'New city',
            'country' => 'New country',
        ]);

        $city = City::where('name', 'New city')->firstOrFail();

        $this->assertDatabaseHas(TravelGuide::class, [
            'city_id' => $city->id,
        ]);
    }
}
