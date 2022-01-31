<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelGuideRequest;
use App\Models\City;
use App\Models\TravelGuide;
use App\Services\CovidStatsAPI;
use App\Services\HotelsAPI;
use App\Services\WeatherAPI;

class TravelGuideController extends Controller
{
    public function index()
    {
        return view('travel-guide');
    }

    public function create(
        TravelGuideRequest $request,
        HotelsAPI $hotelsAPI,
        WeatherAPI $weatherAPI,
        CovidStatsAPI $covidStatsAPI
    )
    {
        $travelGuide = new TravelGuide([
            'hotels' => $hotelsAPI->get($request->city),
            'weather' => $weatherAPI->get($request->city),
            'covid_stats' => $covidStatsAPI->get([
                'country' => $request->country,
                'date' => $request->date,
            ]),
            'date' => $request->date,
        ]);

        if ($request->method() === 'POST') {
            $city = City::firstOrCreate([
                'name' => $request->city,
                'country' => $request->country,
            ], [
                'date' => $request->date,
            ]);

            $city->travelGuides()->save($travelGuide);

            return view('travel-guide');
        }

        return view('travel-guide')->with([
            'travelGuide' => $travelGuide,
        ]);
    }
}
