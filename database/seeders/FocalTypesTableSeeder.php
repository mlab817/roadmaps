<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FocalTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('focal_types')->insert([
            [
                'id'    => 1,
                'name'  => 'Permanent',
            ],
            [
                'id'    => 2,
                'name'  => 'Alternate'
            ],
        ]);
    }
}
