<?php

namespace Database\Seeders;

use App\Models\BlogSubject;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogSubject::create([
            'name' => 'admin',
            'parent_id' => null,
            'category_id' => null,
        ]);
        User::factory()->count(20)->create();
    }
}
