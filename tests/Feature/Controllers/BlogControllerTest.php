<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Tests\TestCase;

class BlogControllerTest extends TestCase
{
    public function usesDataProvider(): bool
    {
        return true;
    }

    public function test_blog_paginate()
    {
        $response = $this->get('/api/blogs');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'success',
        ]);
    }

    public function test_blog_show()
    {
        $this->afterApplicationCreated(function () {
            $ids = $this->getIdSamples();
            foreach ($ids as $id) {
                $response = $this->get("/api/blogs/$id");
                $user = $this->findUser($id);
                if (!$user) {
                    $response->assertNotFound();
                    $response->assertJsonStructure([
                        'message',
                        'success',
                    ]);
                    $response->assertExactJson(
                        [
                            'message' => 'messages.not_found',
                            'success' => false,
                        ]
                    );

                    return;
                }
                $response->assertOk();
                $response->assertJsonStructure(
                    [
                        'data',
                        'success',
                    ]
                );
                $this->assertEquals($id, $user->id);
            }
        });

    }

    public function test_blog_destroy()
    {
        $this->afterApplicationCreated(function () {
            $ids = $this->getIdSamples();
            foreach ($ids as $id) {
                $user = User::query()->find($id);
                $response = $this->delete("/api/blogs/$id");

                if (!$user) {
                    $response->assertNotFound();
                    $response->assertJsonStructure([
                        'message',
                        'success',
                    ]);
                    $response->assertExactJson(
                        [
                            'message' => 'messages.not_found',
                            'success' => false,
                        ]
                    );
                    return;
                }

                $user->delete();
                $this->assertSoftDeleted($user);
            }
        });
    }

    private function getIdSamples()
    {
        return [1, 100000, 101];
    }

    private function findUser($id)
    {
        return User::query()->find($id);
    }
}
