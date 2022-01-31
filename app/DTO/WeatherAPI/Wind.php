<?php

namespace App\DTO\WeatherAPI;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class Wind extends DataTransferObject
{
	public float $speed;
	public int $deg;
	public ?float $gust;
}
