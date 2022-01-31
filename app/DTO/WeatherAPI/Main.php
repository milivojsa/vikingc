<?php

namespace App\DTO\WeatherAPI;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class Main extends DataTransferObject
{
	public float $temp;
	public float $feels_like;
	public float $temp_min;
	public float $temp_max;
	public int $pressure;
	public int $humidity;
	public ?int $sea_level;
	public ?int $grnd_level;
}
