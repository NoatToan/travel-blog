<?php

namespace Database\Seeders;

use App\Enums\User\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::query()->create([
            'first_name' => 'Toan',
            'last_name' => 'Nguyen Truong',
            'phone_number' => '0985213553',
            'email' => 'truongtoanlvc@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$oR8EZLU50Irn2JqKqk/0MOf.1YdsdUTN0fW6jBLPe2RzeGdSPB2Ti', // 123321abc
            'remember_token' => Str::random(10),
            'role_id' => UserRole::ADMIN,
        ]);
    }
}
