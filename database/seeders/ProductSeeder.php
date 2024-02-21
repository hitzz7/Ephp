<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\Item;
use Faker\Factory as FakerFactory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create();
        $productCount = 100000; // Number of products
        $itemsPerProduct = [1, 2, 3, 4, 5]; // Define the range of items per product
        $batchSize = 2000; // Define the batch size for each insertion

        $this->command->getOutput()->progressStart($productCount);

        // Disable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        for ($i = 0; $i < $productCount; $i += $batchSize) {
            $products = [];
            $items = [];

            for ($j = 0; $j < $batchSize; $j++) {
                // Create a product
                $products[] = [
                    'name' => $faker->words(3, true),
                    'description' => $faker->sentence(),
                    'status' => 1,
                    'user_id' => 1,
                    'created_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                    'updated_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                ];

                $itemsCount = $faker->randomElement($itemsPerProduct); // Number of items for each product

                // Generate items data for the product
                for ($k = 0; $k < $itemsCount; $k++) {
                    $items[] = [
                        'product_id' => $i + $j + 1, // Assuming product_id starts from 1
                        'size_id' => $faker->randomElement([1, 2, 3]),
                        'color_id' => $faker->randomElement([1, 2, 3]),
                        'inventory' => $faker->numberBetween(0, 100),
                        'weight' => $faker->randomFloat(2, 0.01, 100),
                        'sku' => $faker->unique()->ean13,
                        'created_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                        'updated_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                    ];
                }

                // Advance the progress bar
                $this->command->getOutput()->progressAdvance();
            }

            // Bulk insert products
            DB::table('products')->insert($products);

            // Bulk insert items
            DB::table('items')->insert($items);
        }

        // Enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Finish the progress bar
        $this->command->getOutput()->progressFinish();
    }
}
