<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'hexcode' => '#fff',
            'product_id' => 1,
        ]);

        DB::table('colors')->insert([
            'hexcode' => '#000',
            'product_id' => 1,
        ]);

        DB::table('colors')->insert([
            'hexcode' => '#0000ff',
            'product_id' => 1,
        ]);
    }
}
