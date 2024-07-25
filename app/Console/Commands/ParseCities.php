<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\City;

class ParseCities extends Command
{
    protected $signature = 'parse:cities';
    protected $description = 'Parse and load cities from HH API';

    public function handle()
    {
        $response = Http::get('https://api.hh.ru/areas');
        $areas = $response->json();

        foreach ($areas[0]['areas'] as $region) {
            foreach ($region['areas'] as $city) {
                City::updateOrCreate(
                    ['slug' => $this->slugify($city['name'])],
                    ['name' => $city['name']]
                );
            }
        }

        $this->info('Cities parsed and loaded successfully.');
    }

    private function slugify($name)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    }
}
