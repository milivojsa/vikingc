<?php

namespace App\DTO\CovidStatsAPI;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class Stats extends DataTransferObject
{
    public string $country;
    public string $code;
    public int $confirmed;
    public int $recovered;
    public int $critical;
    public int $deaths;
    public float $latitude;
    public float $longitude;
    public string $lastChange;
    public string $lastUpdate;
}
