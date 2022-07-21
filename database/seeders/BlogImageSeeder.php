<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = Blog::query()->get();

        foreach ($blogs as $blog) {
            $blog->images()->createMany(
                [
                    [
                        'name' => 'pic_trulli',
                        'path' => 'https://www.w3schools.com/html/pic_trulli.jpg',
                    ],
                    [
                        'name' => 'img_girl',
                        'path' => 'https://www.w3schools.com/html/img_girl.jpg',
                    ],
                    [
                        'name' => 'img_chania',
                        'path' => 'https://www.w3schools.com/html/img_chania.jpg',
                    ],
                ]
            );
        }
    }
}
