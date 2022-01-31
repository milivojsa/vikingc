<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

abstract class BaseAPIService {
    public abstract function sendRequest(mixed $query);

    public abstract function handleResponseData(array $responseArray): array;

    public function get(mixed $query): array {
        $response = $this->sendRequest($query);

        if (! $response->ok()) {
            Log::error($response->body());

            return [];
        }

        $responseArray = json_decode($response->getBody()->getContents(), true);

        return $this->handleResponseData($responseArray);
    }
}