<?php

namespace Database\Seeders;

use App\Enums\ProductCategory\ProductCategoryShowHome;
use App\Enums\ProductCategory\ProductCategoryStatus;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Truyện trinh thám',
                'slug' => 'truyen-trinh-tham',
                'status' => ProductCategoryStatus::Published,
                'show_home' => ProductCategoryShowHome::Yes,
                'position' => 1,
                'desc' => 'Mô tả danh mục 1',
                'title_seo' => 'Danh mục 1 SEO',
                'desc_seo' => 'Mô tả SEO danh mục 1',
            ],
            [
                'name' => 'Truyện kinh dị',
                'slug' => 'truyen-kinh-di',
                'status' => ProductCategoryStatus::Published,
                'show_home' => ProductCategoryShowHome::No,
                'position' => 2,
                'desc' => 'Mô tả danh mục 2',
                'title_seo' => 'Danh mục 2 SEO',
                'desc_seo' => 'Mô tả SEO danh mục 2',
            ],
            [
                'name' => 'Truyện hài',
                'slug' => 'truyen-hai',
                'status' => ProductCategoryStatus::Published,
                'show_home' => ProductCategoryShowHome::Yes,
                'position' => 3,
                'desc' => 'Mô tả danh mục 3',
                'title_seo' => 'Danh mục 3 SEO',
                'desc_seo' => 'Mô tả SEO danh mục 3',
            ],
            [
                'name' => 'Truyện tình cảm',
                'slug' => 'truyen-tinh-cam',
                'status' => ProductCategoryStatus::Draft,
                'show_home' => ProductCategoryShowHome::No,
                'position' => 4,
                'desc' => 'Mô tả danh mục 4',
                'title_seo' => 'Danh mục 4 SEO',
                'desc_seo' => 'Mô tả SEO danh mục 4',
            ],
            [
                'name' => 'Truyện tranh',
                'slug' => 'truyen-tranh',
                'status' => ProductCategoryStatus::Draft,
                'show_home' => ProductCategoryShowHome::No,
                'position' => 5,
                'desc' => 'Mô tả danh mục 5',
                'title_seo' => 'Danh mục 5 SEO',
                'desc_seo' => 'Mô tả SEO danh mục 5',
            ],
            [
                'name' => 'Sách văn học',
                'slug' => 'sach-van-hoc',
                'status' => ProductCategoryStatus::Draft,
                'show_home' => ProductCategoryShowHome::No,
                'position' => 6,
                'desc' => 'Mô tả danh mục 6',
                'title_seo' => 'Danh mục 6 SEO',
                'desc_seo' => 'Mô tả SEO danh mục 6',
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
