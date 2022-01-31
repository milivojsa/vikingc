<?php

namespace Tests\Feature;

use App\Jobs\UpdateTravelGuideData;
use App\Models\City;
use App\Models\TravelGuide;
use Illuminate\Support\Facades\Bus;
use Tests\Feature\Traits\MockAPIServicesTrait;
use Tests\TestCase;

class UpdateTravelGuideDataJobTest extends TestCase
{
    use MockAPIServicesTrait;

    /**
     * @test
     */
    public function job_can_be_dispatched()
    {
        Bus::fake();

        UpdateTravelGuideData::dispatch(City::first());

        Bus::assertDispatched(UpdateTravelGuideData::class);
    }

    /**
     * @test
     */
    public function travel_guide_data_was_created()
    {
        $city = City::create([
            'name' => 'City',
            'country' => 'Country',
            'date' => today(),
        ]);

        $this->mockAPIServices();

        UpdateTravelGuideData::dispatch($city);

        $this->assertDatabaseHas(TravelGuide::class, ['city_id' => $city->id]);
    }
}
