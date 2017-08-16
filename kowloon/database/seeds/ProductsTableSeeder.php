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
            'nl_name' => 'Koelmat',
            'fr_name' => 'Tapis de refroidissement',
            'price' => 15.49,
            'nl_description' => 'Hondenkoelmat',
            'fr_description' => 'Tapis de refroidissement',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'nl_name' => 'Kamerjas',
            'fr_name' => 'Robe de Chambre'
            'price' => 15.49,
            'nl_description' => 'Hondenkamerjas',
            'fr_description' => 'Robe de Chambre',
            'technical_info' => 'Dit is technische hondenjasinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'nl_name' => 'Kamerjas',
            'fr_name' => 'Robe de Chambre'
            'price' => 15.49,
            'nl_description' => 'Hondenkamerjas',
            'fr_description' => 'Robe de Chambre',
            'technical_info' => 'Dit is technische hondenjasinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'nl_name' => 'Koelmat',
            'fr_name' => 'Tapis de refroidissement',
            'price' => 15.49,
            'nl_description' => 'Hondenkoelmat',
            'fr_description' => 'Tapis de refroidissement',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 1,
            'nl_name' => 'Koelmat',
            'fr_name' => 'Tapis de refroidissement',
            'price' => 15.49,
            'nl_description' => 'Hondenkoelmat',
            'fr_description' => 'Tapis de refroidissement',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 2,
            'nl_name' => 'Katzetel',
            'fr_name' => 'Tapis de refroidissement',
            'price' => 15.49,
            'nl_description' => 'Zetel voor katten',
            'fr_description' => 'Tapis de refroidissement',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 3,
            'nl_name' => 'Koelmat',
            'fr_name' => 'Tapis de refroidissement',
            'price' => 15.49,
            'nl_description' => 'Hondenkoelmat',
            'fr_description' => 'Tapis de refroidissement',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 4,
            'nl_name' => 'Koelmat',
            'fr_name' => 'Tapis de refroidissement',
            'price' => 15.49,
            'nl_description' => 'Hondenkoelmat',
            'fr_description' => 'Tapis de refroidissement',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);

        DB::table('products')->insert([
            'category_id' => 5,
            'nl_name' => 'Koelmat',
            'fr_name' => 'Tapis de refroidissement',
            'price' => 15.49,
            'nl_description' => 'Hondenkoelmat',
            'fr_description' => 'Tapis de refroidissement',
            'technical_info' => 'Dit is technische hondenkoelmatinfo'
        ]);
    }
}
