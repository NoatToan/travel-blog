<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class SystemTest extends TestCase
{
    use RefreshDatabase, HasFactory, WithFaker;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_factory()
    {
        $this->assertEquals(1, 1);
    }
}
