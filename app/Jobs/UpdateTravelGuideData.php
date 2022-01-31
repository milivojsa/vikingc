<?php

namespace App\Jobs;

use App\Models\City;
use App\Services\CovidStatsAPI;
use App\Services\HotelsAPI;
use App\Services\WeatherAPI;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateTravelGuideData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \App\Models\City
     */
    private City $city;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        HotelsAPI $hotelsAPI,
        WeatherAPI $weatherAPI,
        CovidStatsAPI $covidStatsAPI
    ) {
        $hotels = $hotelsAPI->get($this->city->name);
        $weather = $weatherAPI->get($this->city->name);
        $covidStats = $covidStatsAPI->get([
            'country' => $this->city->country,
            'date' => today()->format('Y-m-d')
        ]);

        $this->city->travelGuides()->create([
            'hotels' => $hotels,
            'weather' => $weather,
            'covid_stats' => $covidStats,
            'date' => today(),
        ]);
    }
}
