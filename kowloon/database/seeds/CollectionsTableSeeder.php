<?php

use Illuminate\Database\Seeder;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collections')->insert([
            'name' => 'Waterplezier'
        ]);

        DB::table('collections')->insert([
            'name' => 'Luxe'
        ]);

        DB::table('collections')->insert([
            'name' => 'Nieuw'
        ]);

        DB::table('collections')->insert([
            'name' => 'Korting'
        ]);

        DB::table('collections')->insert([
            'name' => 'Andere'
        ]);
    }
}
