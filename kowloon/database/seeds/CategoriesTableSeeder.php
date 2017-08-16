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
            'nl_name' => 'Honden',
            'fr_name' => 'Chiens',
            'classname' => 'dog-icon'
        ]);

        DB::table('categories')->insert([
            'nl_name' => 'Katten',
            'fr_name' => 'Chats',
            'classname' => 'cat-icon'
        ]);

        DB::table('categories')->insert([
            'nl_name' => 'Vissen',
            'fr_name' => 'Poissons',
            'classname' => 'fish-icon'
        ]);

        DB::table('categories')->insert([
            'nl_name' => 'Vogels',
            'fr_name' => 'Oiseaux',
            'classname' => 'bird-icon'
        ]);

        DB::table('categories')->insert([
            'nl_name' => 'Kleine dieren',
            'fr_name' => 'Petits animaux',
            'classname' => 'animal-icon'
        ]);   

        DB::table('categories')->insert([
            'nl_name' => 'Andere',
            'fr_name' => 'Autres',
            'classname' => 'other-icon'
        ]);           
    }
}
