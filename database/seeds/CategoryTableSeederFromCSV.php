<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Category;

class CategoryTableSeederFromCSV extends Seeder
{
    const csv_filename = 'database/files/unique-categories.csv';
    const csv_offset = 0;
    const csv_record_limit = 10000;
    const csv_parent_index = 1;
    const csv_child_index = 0;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath(self::csv_filename);
        $csv->setDelimiter(',');
        $records = $csv
            ->setOffset(self::csv_offset)
            ->setLimit(self::csv_record_limit)
            ->fetchAll();

//        $col1 = [];
//        $col2 = [];
//        for ($i=0; $i <= count($records)-1; $i++) {
//            $col1[$i] = $records[$i][self::csv_parent_index];
//            $col2[$i] = $records[$i][self::csv_child_index];
//        }
//        array_multisort($col1, SORT_ASC, $records);

//        dd($records);
        $tree = [];

        for ($i=0; $i <= count($records)-1; $i++) {
            $parent = $records[$i][self::csv_parent_index];
            $parent = $parent == 'ASSOC - PROFESSIONAL - CULINARY' ? 'ASSOC PROFESSIONAL - CULINARY' : $parent;
            $parent = $parent == 'PROFESSIONAL -  MEDICINE' ? 'PROFESSIONAL - MEDICINE' : $parent;
            if ($parent == '') {
                $parent = 'unclassified';
            }
            if (!in_array($parent, $records))
                $tree = array_add($tree, $parent, null);
            $child = $records[$i][self::csv_child_index];
//            $child = $child == 'ASSOC - PROFESSIONAL - CULINARY' ? 'ASSOC PROFESSIONAL - CULINARY' : $child;
//            $child = $child == 'CHEF SOUS (JUNIOR)' ? 'CHEF SOUS JUNIOR' : $child;
//            $child = $child == 'MANAGER GENERAL (RESTAURANT)' ? 'MANAGER GENERAL RESTAURANT' : $child;
            $child = $child == 'TEACHER PRE SCHOOL' ? 'TEACHER PRE-SCHOOL' : $child;
            $child = $child == 'ANESTHETIST' ? 'ANAESTHETIST' : $child;
//            $child = $child == 'PROFESSIONAL -  MEDICINE' ? 'PROFESSIONAL - MEDICINE' : $child;
            $child = $child == 'MECHANIC AC' ? 'MECHANIC A/C' : $child;
            $child = $child == 'MECHANIC AC ASSISTANT' ? 'MECHANIC A/C ASSISTANT' : $child;
            $child = $child == 'MECHANIC ASSISTANT - MAINTENANCE' ? 'MECHANIC ASSISTANT MAINTENANCE' : $child;
            $child = $child == 'TECHNICIAN X RAY' ? 'TECHNICIAN X-RAY' : $child;
            $child = $child == 'OPERATOR CONCRETE-PUMP' ? 'OPERATOR CONCRETE PUMP' : $child;
            $child = $child == 'SUPERVISOR / INFRASTRUCTURE' ? 'SUPERVISOR INFRASTRUCTURE' : $child;
            $child = $child == 'SUPERVISOR MECHANICAL / PIPING' ? 'SUPERVISOR MECHANICAL PIPING' : $child;
            $child = $child == 'TECHNICIAN AV' ? 'TECHNICIAN A/V' : $child;
            $child = $child == 'TECHNICIAN INSTRUMENT - MAINTENANCE' ? 'TECHNICIAN INSTRUMENT MAINTENANCE' : $child;

            $child = str_replace('(','', $child);
            $child = str_replace(')','', $child);

            if ($child == '') {
                continue;
            }
            $tree = array_add($tree, $child, $parent);
        }
        $categories = parseTree($tree);

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
