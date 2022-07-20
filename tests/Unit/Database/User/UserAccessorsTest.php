<?php

namespace Tests\Unit\Database\User;

use App\Enums\User\UserRole;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAccessorsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_full_name_accessor()
    {
        $this->afterApplicationCreated(function () {
            $user = User::query()->find(1);

            $this->assertEquals($user->full_name, implode(" ", array($user->first_name, $user->last_name)));


            $roles = UserRole::getValues();
            $this->assertEquals($user->inRole($roles), in_array($user->role_id, $roles));
        });
    }
}
