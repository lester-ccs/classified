<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Area;

class AreaTableSeederFromCSV extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath('database/files/countries.csv');
        $csv->setDelimiter(',');
        $records = $csv->setOffset(1)->setLimit(500)->fetchAll(); //do not read the headers
        $tree = [];
        for ($i=0; $i <= count($records)-1; $i++) {
            $region = $records[$i][6];
            if ($region == '') {
                $region = 'Uncharted';
            }
            if (!in_array($region, $records))
                $tree = array_add($tree, $region, null);
            $country = $records[$i][0];
            if ($country == '') {
                continue;
            }
            $tree = array_add($tree, $country, $region);
        }
        $areas = parseTree($tree);

        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}
