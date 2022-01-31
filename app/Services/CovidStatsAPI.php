<?php

namespace App\Services;

use App\DTO\CovidStatsAPI\Stats;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CovidStatsAPI extends BaseAPIService
{
    public function sendRequest(mixed $query)
    {
        return Http::withHeaders([
            'x-rapidapi-host' => config('apis.covid_stats.x-rapidapi-host'),
            'x-rapidapi-key' => config('apis.covid_stats.x-rapidapi-key'),
        ])->get(config('apis.covid_stats.url'), [
            'name' => $query['country'] ?? '',
            'date' => $query['date'] ?? '',
        ]);
    }

    public function handleResponseData(array $responseArray): array
    {
        try {
            $stats = new Stats(head($responseArray));

            return [
                'confirmed' => $stats->confirmed,
                'recovered' => $stats->recovered,
                'critical' => $stats->critical,
                'deaths' => $stats->deaths,
            ];
        } catch (UnknownProperties $e) {
            Log::error($e->getMessage());

            return [];
        }
    }
}