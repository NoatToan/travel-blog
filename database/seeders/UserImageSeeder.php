<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::query()->get();
 $randomImages =[
        'https://m.media-amazon.com/images/I/41WpqIvJWRL._AC_UY436_QL65_.jpg',
        'https://m.media-amazon.com/images/I/61ghDjhS8vL._AC_UY436_QL65_.jpg',
        'https://m.media-amazon.com/images/I/61c1QC4lF-L._AC_UY436_QL65_.jpg',
        'https://m.media-amazon.com/images/I/710VzyXGVsL._AC_UY436_QL65_.jpg',
        'https://m.media-amazon.com/images/I/61EPT-oMLrL._AC_UY436_QL65_.jpg',
        'https://m.media-amazon.com/images/I/71r3ktfakgL._AC_UY436_QL65_.jpg',
        'https://m.media-amazon.com/images/I/61CqYq+xwNL._AC_UL640_QL65_.jpg',
        'https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg',
        'https://m.media-amazon.com/images/I/71E+oh38ZqL._AC_UL640_QL65_.jpg',
        'https://m.media-amazon.com/images/I/61uSHBgUGhL._AC_UL640_QL65_.jpg',
        'https://m.media-amazon.com/images/I/71nDK2Q8HAL._AC_UL640_QL65_.jpg'
   ];

        foreach ($users as $user) {
            $user->images()->createMany(
                [
                    [
                        'name' => 'pic_trulli',
                        'path' => $randomImages[rand(0, 10)],
                        'image_type' => 'main_profile_image'
                    ],
                    [
                        'name' => 'img_girl',
                        'path' => 'https://source.unsplash.com/random',
                        'image_type' => 'profile_image'
                    ],
                    [
                        'name' => 'img_chania',
                        'path' => 'https://source.unsplash.com/random',
                        'image_type' => 'profile_image'
                    ],
                ]
            );
        }
    }
}
