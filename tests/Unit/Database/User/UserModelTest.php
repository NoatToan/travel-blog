<?php

namespace Tests\Unit\Database\User;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Run a specific seeder before each test.
     *
     * @var string
     */
    protected $seeder = UserSeeder::class;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_eloquent()
    {
        $this->afterApplicationCreated(function () {
            $user = User::query()->find(1);

            $this->assertModelExists($user);

            $this->assertDatabaseHas('users', [
                'email' => 'truongtoanlvc@gmail.com'
            ]);

            $user->delete();
            $this->assertSoftDeleted($user);
        });
    }
}
