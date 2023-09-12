<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = Faker::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createBlogSubjectsByCategory($this->createCategory([
            'name' => 'Blog Travel',
            'code' => 'blog',
            'description' => $this->faker->realText(50),
        ]));

        $this->createBlogSubjectsByCategory($this->createCategory([
            'name' => 'Seeking Tour Guide',
            'code' => 'seeking_tour_guide',
            'description' => $this->faker->realText(50),
        ]));

        $this->createBlogSubjectsByCategory($this->createCategory([
            'name' => 'Hotel',
            'code' => 'hotel',
            'description' => $this->faker->realText(50),
        ]));

        $this->createBlogSubjectsByCategory($this->createCategory([
            'name' => 'Restaurant',
            'code' => 'restaurant',
            'description' => $this->faker->realText(50),
        ]));
    }

    private function createCategory($params)
    {
        return Category::query()->create([
            'name' => $params['name'],
            'code' => $params['code'],
            'description' => $params['description'],
        ]);
    }

    private function createBlogSubjectsByCategory($cat)
    {
        $blogSubject = [];
        for ($i = 0; $i < 5; $i++) {
            $blogSubject[] = [
                'name' => 'SUBJECT ' . $cat->name . ' ' . ($i + 1),
            ];
        }
        $blogSubjects = $cat->blogSubjects()->createMany($blogSubject);
        $blogs = [];
        foreach ($blogSubjects as $key => $subject) {
            for ($i = 0; $i < 5; $i++) {
                $blogs[] = [
                    'name' => 'BLOG ' . $blogSubjects[$key]->name . ' ' . $i,
                    'content' => $this->faker->realText(200, 1),
                    'author_id' => $this->faker->numberBetween(1, 10),
                    'status' => $this->faker->numberBetween(1, 3),
                    'like_total' => $this->faker->numberBetween(1, 100),
                    'dislike_total' => $this->faker->numberBetween(1, 100),
                    'comment_total' => $this->faker->numberBetween(1, 100),
                ];
            }

            $subject->blogs()->createMany($blogs);
        }
    }
}
