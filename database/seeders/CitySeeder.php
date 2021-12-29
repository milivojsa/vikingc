<?php

namespace Database\Seeders;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath('./database/seeders/data/data.csv', 'r');
        $csv->setOutputBOM(Reader::BOM_UTF8);
        $csv->addStreamFilter('convert.iconv.Windows-1250/UTF-8');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();

        foreach ($records as $record) {
            City::create([
                'name' => $record['City'],
                'country' => $record['Country'],
                'date' => Carbon::createFromFormat('d.m.y', $record['Date']),
            ]);
        }
    }
}
