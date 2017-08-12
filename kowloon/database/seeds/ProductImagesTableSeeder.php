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
            'description' => 'Cooling Mat for Dogs'
        ]);
    }
}
