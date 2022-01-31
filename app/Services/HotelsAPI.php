<?php

namespace App\Services;

use App\DTO\HotelsAPI\Entity;
use App\DTO\HotelsAPI\Search;
use App\DTO\HotelsAPI\Suggestion;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class HotelsAPI extends BaseAPIService
{
    public function sendRequest(mixed $query)
    {
        return Http::withHeaders([
            'x-rapidapi-host' => config('apis.hotels.x-rapidapi-host'),
            'x-rapidapi-key' => config('apis.hotels.x-rapidapi-key'),
        ])->get(config('apis.hotels.url'), [
            'query' => strtolower($query),
            'locale' => 'en_US',
            'currency' => 'EUR',
        ]);
    }

    public function handleResponseData(array $responseArray): array
    {
        try {
            $search = new Search($responseArray);
            $suggestions = new Suggestion($search->suggestions[1]);

            $entities = array_slice(array_filter($suggestions->entities, function ($entityArray) {
                return (new Entity($entityArray))->type === 'HOTEL';
            }), 0, 3);

            $hotels = [];
            foreach ($entities as $entityArray) {
                $entity = new Entity($entityArray);

                $hotels[] = [
                    'name' => $entity->name,
                    'latitude' => $entity->latitude,
                    'longitude' => $entity->longitude,
                ];
            }

            return $hotels;
        } catch (UnknownProperties $e) {
            Log::error($e->getMessage());

            return [];
        }
    }
}