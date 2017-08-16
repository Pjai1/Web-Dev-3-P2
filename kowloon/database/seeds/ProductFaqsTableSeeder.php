<?php

use Illuminate\Database\Seeder;

class ProductFaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq_product')->insert([
            'product_id' => 1,
            'faq_id' => 1
        ]);

        DB::table('faq_product')->insert([
            'product_id' => 1,
            'faq_id' => 2
        ]);

        DB::table('faq_product')->insert([
            'product_id' => 1,
            'faq_id' => 3
        ]);
    }
}
