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
            'fr_description' => 'Tapis de refroidissement'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 1,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Koelmat voor honden',
            'fr_description' => 'Tapis de refroidissement'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 1,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Koelmat voor honden',
            'fr_description' => 'Tapis de refroidissement'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 2,
            'image_url' => 'kamerjas_hond.jpg',
            'nl_description' => 'Kamerjas voor honden',
            'fr_description' => 'Robe de Chambre'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 3,
            'image_url' => 'kamerjas_hond.jpg',
            'nl_description' => 'Kamerjas voor honden',
            'fr_description' => 'Robe de Chambre'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 4,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => 'Tapis de refroidissement'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 5,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => 'Tapis de refroidissement'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 6,
            'image_url' => 'katzetel.jpg',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => 'Tapis de refroidissement'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 7,
            'image_url' => 'vishengel.jpg',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => 'canne à pêche'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 8,
            'image_url' => 'vogelsleutel.jpg',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => 'clé oiseau'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 9,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => 'Tapis de refroidissement'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 10,
            'image_url' => 'vogelsleutel.jpg',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => 'Tapis de refroidissement'
        ]);

        DB::table('product_images')->insert([
            'product_id' => 11,
            'image_url' => 'cooling_mat.png',
            'nl_description' => 'Cooling Mat for Dogs',
            'fr_description' => 'Tapis de refroidissement'
        ]);
    }
}
