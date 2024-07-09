<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;
use App\Models\Category;
use Faker\Factory as Faker;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        $categoryIds = Category::pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) { 
            Products::create([
                'name' => $faker->word,
                'image' => 'hinh' . $i . '.jpg',
                'price' => $faker->randomFloat(2, 10, 1000),
                'price_sale' => $faker->randomFloat(2, 10, 1000),
                'category_id' => $faker->randomElement($categoryIds),
                'quantity' => $faker->numberBetween(1, 100),
                'sold' => $faker->numberBetween(1, 100),
                'view' => $faker->numberBetween(1, 100),
                'description' => $faker->sentence,
                'active' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
