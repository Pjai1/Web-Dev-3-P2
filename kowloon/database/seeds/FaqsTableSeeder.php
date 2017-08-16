<?php

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            'nl_question' => 'Hoe koop ik een product?',
            'nl_answer' => 'Door op kopen te drukken.',
            'fr_question' => 'Comment puis-je acheter un produit?',
            'fr_answer' => "En achetant l'impression."
        ]);

        DB::table('faqs')->insert([
            'nl_question' => 'Hoe werkt een koelmat?',
            'nl_answer' => 'De mat wordt opgeblazen en gevuld met water.',
            'fr_question' => 'Comment un tapis de refroidissement?',
            'fr_answer' => "Le tapis est soufflé vers le haut et rempli d'eau.",
        ]);

        DB::table('faqs')->insert([
            'nl_question' => 'Hoe verstuur ik een contactformulier.',
            'nl_answer' => 'Vul de velden in en verzend.',
            'fr_question' => 'Comment soumettre un formulaire de contact.',
            'fr_answer' => 'Remplissez les champs et envoyer.',
        ]);

        DB::table('faqs')->insert([
            'nl_question' => 'Waar koop ik een kat?',
            'nl_answer' => 'Wij verkopen geen katten',
            'fr_question' => 'Où puis-je acheter un chat?',
            'fr_answer' => 'Nous ne vendons pas les chats',
        ]);
    }
}
