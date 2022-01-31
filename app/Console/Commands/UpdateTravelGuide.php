<?php

namespace App\Console\Commands;

use App\Jobs\UpdateTravelGuideData;
use App\Models\City;
use Illuminate\Console\Command;

class UpdateTravelGuide extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:travel-guide';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update cities travel guide data.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (City::cursor() as $city) {
            UpdateTravelGuideData::dispatch($city);
        }

        return 0;
    }
}
