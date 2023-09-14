<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory(2000)->create();
                $this->call([
        //            UserSeeder::class,
          //          CategorySeeder::class,
            //        DistrictSeeder::class,
              //      BlogImageSeeder::class,
                    UserImageSeeder::class,
                ]);

    }
}
