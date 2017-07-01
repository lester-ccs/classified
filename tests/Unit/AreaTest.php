<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreaTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAreaTableSeederFromCSV()
    {
        $this->artisan('db:seed', ['--class' => 'AreaTableSeederFromCSV']);
        $area = config('classified.defaults.area');
        $this->assertDatabaseHas('areas', [
            'slug' => $area,
        ]);

        $this->assertTrue(true);
    }
}
