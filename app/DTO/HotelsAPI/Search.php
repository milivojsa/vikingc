<?php

namespace App\DTO\HotelsAPI;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class Search extends DataTransferObject
{
	public string $term;
	public int $moresuggestions;
	public $autoSuggestInstance;
	public string $trackingID;
	public bool $misspellingfallback;

	/** @var \App\DTO\HotelsAPI\Suggestion[] $suggestions */
	public array $suggestions;
	public bool $geocodeFallback;
}
