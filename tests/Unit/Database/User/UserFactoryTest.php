<?php

namespace Tests\Unit\Database\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserFactoryTest extends TestCase
{
    use RefreshDatabase, HasFactory, WithFaker;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_factory()
    {
        $this->afterApplicationCreated(function () {
            $this->assertDatabaseCount(User::class, 11);
        });
    }
}
