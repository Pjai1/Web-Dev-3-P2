<?php

use Illuminate\Database\Seeder;

class HotItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hot_items')->insert([
            'product_id' => 1,
        ]);
        DB::table('hot_items')->insert([
            'product_id' => 2,
        ]);
        DB::table('hot_items')->insert([
            'product_id' => 3,
        ]);
        DB::table('hot_items')->insert([
            'product_id' => 4,
        ]);
    }
}
