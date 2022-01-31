<?php

namespace App\DTO\HotelsAPI;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class Suggestion extends DataTransferObject
{
	public string $group;

	/** @var \App\DTO\HotelsAPI\Entity[] $entities */
	public array $entities;
}
