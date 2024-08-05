<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'title' => 'Tin tức',
                'slug' => 'tin-tuc',
                'position' => 0,
                'content' => '<p>Nội dung tin tức</p>',
                'title_seo' => 'Tin tức',
                'desc_seo' => 'Mô tả tin tức',
            ],
            [
                'title' => 'Về chúng tôi',
                'slug' => 've-chung-toi',
                'position' => 1,
                'content' => '<p>Nội dung về chúng tôi</p>',
                'title_seo' => 'Về chúng tôi',
                'desc_seo' => 'Mô tả về chúng tôi',
            ],
            [
                'title' => 'Liên hệ',
                'slug' => 'lien-he',
                'position' => 2,
                'content' => '<p>Nội dung liên hệ</p>',
                'title_seo' => 'Liên hệ',
                'desc_seo' => 'Mô tả liên hệ',
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
