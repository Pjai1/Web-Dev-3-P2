<?php

use Illuminate\Database\Seeder;

class DimensionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dimensions')->insert([
            'specs' => 'S - Ø 53x18cm',
            'product_id' => 1,
        ]);

        DB::table('dimensions')->insert([
            'specs' => 'L - Ø 53x18cm',
            'product_id' => 2,
        ]);

        DB::table('dimensions')->insert([
            'specs' => 'M - Ø 53x18cm',
            'product_id' => 3,
        ]);

        DB::table('dimensions')->insert([
            'specs' => 'S - Ø 53x18cm',
            'product_id' => 4,
        ]);

        DB::table('dimensions')->insert([
            'specs' => 'S - Ø 53x18cm',
            'product_id' => 5,
        ]);

        DB::table('dimensions')->insert([
            'specs' => 'L - Ø 53x18cm',
            'product_id' => 6,
        ]);

        DB::table('dimensions')->insert([
            'specs' => 'M - Ø 53x18cm',
            'product_id' => 7,
        ]);

        DB::table('dimensions')->insert([
            'specs' => 'S - Ø 53x18cm',
            'product_id' => 8,
        ]);

        DB::table('dimensions')->insert([
            'specs' => 'S - Ø 53x18cm',
            'product_id' => 9,
        ]);
    }
}
