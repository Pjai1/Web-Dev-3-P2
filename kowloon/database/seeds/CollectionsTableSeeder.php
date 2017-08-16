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
            'nl_name' => 'Waterplezier',
            'fr_name' => 'Fraicheur'
        ]);

        DB::table('collections')->insert([
            'nl_name' => 'Luxe',
            'fr_name' => 'Luxe'
        ]);

        DB::table('collections')->insert([
            'nl_name' => 'Nieuw',
            'fr_name' => 'Nouveau'
        ]);

        DB::table('collections')->insert([
            'nl_name' => 'Korting',
            'fr_name' => 'En Soldes'
        ]);

        DB::table('collections')->insert([
            'nl_name' => 'Andere',
            'fr_name' => 'Autres'
        ]);
    }
}
