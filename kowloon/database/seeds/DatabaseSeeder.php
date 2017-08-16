<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductImagesTableSeeder::class);
        $this->call(CarouselImagesSeeder::class);
        $this->call(HotItemsTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(CollectionsTableSeeder::class);
        $this->call(ProductCollectionsTableSeeder::class);
        $this->call(ProductFaqsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(DimensionsTableSeeder::class);
    }
}
