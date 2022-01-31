<?php

namespace Tests\Feature;

use Tests\Feature\Traits\MockAPIServicesTrait;
use Tests\TestCase;

class UpdateTravelGuideCommandTest extends TestCase
{
    use MockAPIServicesTrait;

    /**
     * @test
     */
    public function command_is_successful()
    {
        $this->mockAPIServices();

        $this->artisan('update:travel-guide')
            ->assertSuccessful();
    }
}
