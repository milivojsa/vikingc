<?php

namespace App\DTO\WeatherAPI;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class Weather extends DataTransferObject
{
	public int $id;
	public string $main;
	public string $description;
	public string $icon;
}
