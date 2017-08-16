<?php

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
            'product_id' => 1,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Koelmat voor honden',
            'fr_description' => ''
        ]);

        DB::table('product_images')->insert([
            'product_id' => 2,
            'image_url' => 'kamerjas_hond.jpg',
            'nl_description' => 'Kamerjas voor honden',
            'fr_description' => ''
        ]);

        DB::table('product_images')->insert([
            'product_id' => 2,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => ''
        ]);

        DB::table('product_images')->insert([
            'product_id' => 3,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => ''
        ]);

        DB::table('product_images')->insert([
            'product_id' => 4,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => ''
        ]);

        DB::table('product_images')->insert([
            'product_id' => 5,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => ''
        ]);

        DB::table('product_images')->insert([
            'product_id' => 6,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => ''
        ]);
    }
}
