<?php

namespace App\DTO\WeatherAPI;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class CurrentWeather extends DataTransferObject
{
	public Coord $coord;

	/** @var \App\DTO\WeatherAPI\Weather[] $weather */
	public array $weather;
	public string $base;
	public Main $main;
	public int $visibility;
	public Wind $wind;
	public Clouds $clouds;
	public int $dt;
	public Sys $sys;
    public ?array $snow;
	public int $timezone;
	public int $id;
	public string $name;
	public int $cod;
}
