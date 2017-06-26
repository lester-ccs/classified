<?php

use App\Area;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array containing areas in specific NestedSet format.
        $areas = [
            [
                'name' => 'US',
                'children' => [
                    [
                        'name' => 'Alabama',
                        'children' => [
                            ['name' => 'Auburn', 'useable' => true],
                            ['name' => 'Birmingham', 'useable' => true],
                            ['name' => 'Dothan', 'useable' => true],
                            ['name' => 'Florence / Muscle shoals', 'useable' => true],
                            ['name' => 'Huntsville / Decatur', 'useable' => true],
                            ['name' => 'Mobile', 'useable' => true],
                            ['name' => 'Montgomery', 'useable' => true],
                            ['name' => 'Tuscaloosa', 'useable' => true],
                        ],
                    ],
                    [
                        'name' => 'Alaska',
                        'children' => [
                            ['name' => 'Anchorage / Mat-su', 'useable' => true],
                            ['name' => 'Fairbanks', 'useable' => true],
                            ['name' => 'Kenai Peninsula', 'useable' => true],
                            ['name' => 'Southeast Alaska', 'useable' => true],
                        ],
                    ],
                    [
                        'name' => 'Arizona',
                        'children' => [
                            ['name' => 'Flagstaff / Sedona', 'useable' => true],
                            ['name' => 'Mohave County', 'useable' => true],
                            ['name' => 'Phoenix', 'useable' => true],
                            ['name' => 'Prescott', 'useable' => true],
                            ['name' => 'Show Low', 'useable' => true],
                            ['name' => 'Sierra Vista', 'useable' => true],
                            ['name' => 'Tucson', 'useable' => true],
                            ['name' => 'Yuma', 'useable' => true],
                        ],
                    ],
                    [
                        'name' => 'Arkansas',
                        'children' => [
                            ['name' => 'Fayetteville', 'useable' => true],
                            ['name' => 'Fort Smith', 'useable' => true],
                            ['name' => 'Jonesboro', 'useable' => true],
                            ['name' => 'Little Rock', 'useable' => true],
                            ['name' => 'Texarkana', 'useable' => true],
                        ],
                    ],
                    [
                        'name' => 'California',
                        'children' => [
                            ['name' => 'Bakersfield', 'useable' => true],
                            ['name' => 'Chico', 'useable' => true],
                            ['name' => 'Fresno / Madera', 'useable' => true],
                            ['name' => 'Gold Country', 'useable' => true],
                            ['name' => 'Hanford-Corcoran', 'useable' => true],
                            ['name' => 'Humboldt County', 'useable' => true],
                            ['name' => 'Inland Empire', 'useable' => true],
                            ['name' => 'Los Angeles', 'useable' => true],
                            ['name' => 'Mendocino County', 'useable' => true],
                            ['name' => 'Merced', 'useable' => true],
                            ['name' => 'Modesto', 'useable' => true],
                            ['name' => 'Monterey Bay', 'useable' => true],
                            ['name' => 'Orange County', 'useable' => true],
                            ['name' => 'Palm Springs', 'useable' => true],
                            ['name' => 'Redding', 'useable' => true],
                            ['name' => 'Sacramento', 'useable' => true],
                            ['name' => 'San Diego', 'useable' => true],
                            ['name' => 'San Francisco Bay Area', 'useable' => true],
                            ['name' => 'San Luis Obispo', 'useable' => true],
                            ['name' => 'Santa Barbara', 'useable' => true],
                            ['name' => 'Santa Maria', 'useable' => true],
                            ['name' => 'Siskiyou County', 'useable' => true],
                            ['name' => 'Stockton', 'useable' => true],
                            ['name' => 'Susanville', 'useable' => true],
                            ['name' => 'Ventura County', 'useable' => true],
                            ['name' => 'Visalia-Tulare', 'useable' => true],
                            ['name' => 'Yuba-Sutter', 'useable' => true],
                        ],
                    ],
                ],

            ],
            [
                'name' => 'Middle East',
                'children' => [
                    ['name' => 'Oman', 'useable' => true],
                    ['name' => 'Saudi Arabis', 'useable' => true],
                    ['name' => 'United Arab Emrirates', 'useable' => true],
                    ['name' => 'Quatar', 'useable' => true],
                ],
            ],
            [
                'name' => 'Europe',
                'children' => [
                    ['name' => 'London', 'useable' => true],
                    ['name' => 'Paris', 'useable' => true],
                    ['name' => 'Madrid', 'useable' => true],
                    ['name' => 'Stockholm', 'useable' => true],
                    ['name' => 'Copenhagen', 'useable' => true],
                ],
            ],
            [
                'name' => 'Asia',
                'children' => [
                    ['name' => 'Taiwan', 'useable' => true],
                    ['name' => 'Hongkong', 'useable' => true],
                    ['name' => 'Singapore', 'useable' => true],
                ],
            ],
            [
                'name' => 'Africa',
                'children' => [
                    ['name' => 'Nigeria', 'useable' => true],
                    ['name' => 'Oman', 'useable' => true],
                ],
            ],
        ];

        // Iterate through each area (e.g. US)
        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}
