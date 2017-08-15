<?php

use Illuminate\Database\Seeder;

class ProductCollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_collections')->insert([
            'product_id' => 1,
            'collection_id' => 1
        ]);

        DB::table('product_collections')->insert([
            'product_id' => 2,
            'collection_id' => 2
        ]);

        DB::table('product_collections')->insert([
            'product_id' => 3,
            'collection_id' => 3
        ]);

        DB::table('product_collections')->insert([
            'product_id' => 4,
            'collection_id' => 4
        ]);

        DB::table('product_collections')->insert([
            'product_id' => 1,
            'collection_id' => 5
        ]);
    }
}
