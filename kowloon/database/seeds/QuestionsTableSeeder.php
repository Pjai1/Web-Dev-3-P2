<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            'question' => 'Ben ik een vraag?',
            'answer' => 'Ik ben een vraag.'
        ]);

        DB::table('faqs')->insert([
            'question' => 'Ben ik een vraag?',
            'answer' => 'Ik ben een vraag.'
        ]);

        DB::table('faqs')->insert([
            'question' => 'Ben ik een vraag?',
            'answer' => 'Ik ben een vraag.'
        ]);
    }
}
