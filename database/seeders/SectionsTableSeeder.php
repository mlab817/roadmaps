<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('sections')->truncate();

        $json = File::get(database_path() . '/outline.json');
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('sections')->insert([
                'id'            => $item['id'],
                'title'         => $item['title'],
                'description'   => $item['description'],
                'item_number'   => $item['item_number'],
                'parent_id'     => $item['parent_id'] == '' ? null : (int) $item['parent_id'],
                'level'         => (int) $item['level'],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
