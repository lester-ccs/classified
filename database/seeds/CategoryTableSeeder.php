<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Community',
                'children' => [
                    ['name' => 'Activities', 'useable' => true],
                    ['name' => 'Artists', 'useable' => true],
                    ['name' => 'Childcare', 'useable' => true],
                    ['name' => 'Classes', 'useable' => true],
                    ['name' => 'Events', 'useable' => true],
                    ['name' => 'General', 'useable' => true],
                    ['name' => 'Groups', 'useable' => true],
                    ['name' => 'Local news', 'useable' => true],
                    ['name' => 'Lost and found', 'useable' => true],
                    ['name' => 'Musicians', 'useable' => true],
                    ['name' => 'Pets', 'useable' => true],
                    ['name' => 'Politics', 'useable' => true],
                    ['name' => 'Rideshare', 'useable' => true],
                    ['name' => 'Volunteers', 'useable' => true],
                ]
            ],
            [
                'name' => 'Personals',
                'children' => [
                    ['name' => 'Strictly platonic', 'useable' => true],
                    ['name' => 'Women seeking women', 'useable' => true],
                    ['name' => 'Women seeking men', 'useable' => true],
                    ['name' => 'Men seeking women', 'useable' => true],
                    ['name' => 'Men seeking men', 'useable' => true],
                    ['name' => 'Misc romance', 'useable' => true],
                    ['name' => 'Casual encounters', 'useable' => true],
                    ['name' => 'Missed connections', 'useable' => true],
                    ['name' => 'Rants and raves', 'useable' => true],
                ]
            ],
            [
                'name' => 'Housing',
                'children' => [
                    ['name' => 'Apartments / housing', 'useable' => true],
                    ['name' => 'Housing swap', 'useable' => true],
                    ['name' => 'Housing wanted', 'useable' => true],
                    ['name' => 'Office / commercial', 'useable' => true],
                    ['name' => 'Parking / storage', 'useable' => true],
                    ['name' => 'Real estate for sale', 'useable' => true],
                    ['name' => 'Rooms / shared', 'useable' => true],
                    ['name' => 'Rooms wanted', 'useable' => true],
                    ['name' => 'Sublets / temporary', 'useable' => true],
                    ['name' => 'Vacation rentals', 'useable' => true],
                ]
            ],
        ];

        // Iterate through each category
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
