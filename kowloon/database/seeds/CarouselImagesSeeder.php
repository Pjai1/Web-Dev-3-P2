<?php

use Illuminate\Database\Seeder;

class CarouselImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carousel_images')->insert([
            'image_url' => 'carousel-1.png',
        ]);
        DB::table('carousel_images')->insert([
            'image_url' => 'carousel-2.png',
        ]);
        DB::table('carousel_images')->insert([
            'image_url' => 'carousel-3.png',
        ]);
    }
}
