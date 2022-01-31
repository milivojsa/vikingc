<?php

namespace App\DTO\WeatherAPI;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class Coord extends DataTransferObject
{
	public float $lon;
	public float $lat;
}
