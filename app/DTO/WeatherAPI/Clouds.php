<?php

namespace App\DTO\WeatherAPI;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class Clouds extends DataTransferObject
{
	public int $all;
}
