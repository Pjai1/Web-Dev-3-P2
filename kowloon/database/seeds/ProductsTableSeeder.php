<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Koelmat',
            'price' => 15.49,
            'description' => 'Hondenkoelmat',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Koelmat',
            'price' => 15.49,
            'description' => 'Hondenkoelmat',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Koelmat',
            'price' => 15.49,
            'description' => 'Hondenkoelmat',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Koelmat',
            'price' => 15.49,
            'description' => 'Hondenkoelmat',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Koelmat',
            'price' => 15.49,
            'description' => 'Hondenkoelmat',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Koelmat',
            'price' => 15.49,
            'description' => 'Hondenkoelmat',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);
    }
}
