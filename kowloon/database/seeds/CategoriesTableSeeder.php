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
            'name' => 'Honden',
            'classname' => 'dog-icon'
        ]);

        DB::table('categories')->insert([
            'name' => 'Katten',
            'classname' => 'cat-icon'
        ]);

        DB::table('categories')->insert([
            'name' => 'Vissen',
            'classname' => 'fish-icon'
        ]);

        DB::table('categories')->insert([
            'name' => 'Vogels',
            'classname' => 'bird-icon'
        ]);

        DB::table('categories')->insert([
            'name' => 'Kleine dieren',
            'classname' => 'animal-icon'
        ]);   

        DB::table('categories')->insert([
            'name' => 'Andere',
            'classname' => 'other-icon'
        ]);           
    }
}
