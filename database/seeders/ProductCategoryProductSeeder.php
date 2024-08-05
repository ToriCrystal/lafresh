<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCategoryProductRelations = [
            // Example relationships between product IDs and category IDs
            [
                'product_id' => 1,
                'category_id' => 1,
            ],
            [
                'product_id' => 1,
                'category_id' => 2,
            ],
            [
                'product_id' => 2,
                'category_id' => 2,
            ],
            [
                'product_id' => 2,
                'category_id' => 3,
            ],
            // Add more relations as needed
        ];

        DB::table('product_categories_products')->insert($productCategoryProductRelations);
    }
}
