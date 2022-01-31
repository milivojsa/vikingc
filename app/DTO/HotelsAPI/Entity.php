<?php

namespace App\DTO\HotelsAPI;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class Entity extends DataTransferObject
{
	public string $geoId;
	public string $destinationId;
	public $landmarkCityDestinationId;
	public string $type;
	public string $redirectPage;
	public float $latitude;
	public float $longitude;
	public $searchDetail;
	public string $caption;
	public string $name;
}
