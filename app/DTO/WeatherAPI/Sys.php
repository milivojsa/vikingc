<?php

namespace App\DTO\WeatherAPI;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class Sys extends DataTransferObject
{
	public int $type;
	public int $id;
	public string $country;
	public int $sunrise;
	public int $sunset;
}
