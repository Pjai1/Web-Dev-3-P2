<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Honden'
        ]);

        DB::table('categories')->insert([
            'name' => 'Katten'
        ]);

        DB::table('categories')->insert([
            'name' => 'Vissen'
        ]);

        DB::table('categories')->insert([
            'name' => 'Vogels'
        ]);

        DB::table('categories')->insert([
            'name' => 'Kleine dieren'
        ]);        
    }
}
