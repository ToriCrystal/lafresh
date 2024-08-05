<?php

namespace Database\Seeders;

use App\Enums\Product\ProductFeature;
use App\Enums\Product\ProductNew;
use App\Enums\Product\ProductStatus;
use App\Enums\Product\ProductUnit;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Product 1',
                'slug' => Str::slug('Product 1'),
                'price' => 100.00,
                'price_selling' => 90.00,
                'price_promotion' => 80.00,
                'sku' => 'PROD1',
                'manager_stock' => true,
                'qty' => 10,
                'in_stock' => true,
                'status' => ProductStatus::Published->value,
                'feature_image' => 'https://example.com/product1.jpg',
                'gallery' => '["https://example.com/product1_1.jpg","https://example.com/product1_2.jpg"]',
                'short_desc' => 'Short description for Product 1',
                'desc' => 'Detailed description for Product 1',
                'content_specification' => 'Specifications for Product 1',
                'content_application' => 'Applications for Product 1',
                'content_download' => 'Downloads for Product 1',
                'unit' => ProductUnit::Pail->value,
                'feature' => ProductFeature::No->value,
                'new' => ProductNew::Yes->value,
                'viewed' => 100,
                'title_seo' => 'Product 1 SEO Title',
                'desc_seo' => 'SEO Description for Product 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more products as needed
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
