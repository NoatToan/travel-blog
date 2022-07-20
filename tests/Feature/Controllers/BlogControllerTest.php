<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class BlogControllerTest extends TestCase
{
    public function test_blog_paginate()
    {
        $response = $this->get('/api/blogs');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'current_page',
            'data',
            'first_page_url',
            'from',
            'last_page',
            'last_page_url',
            'links',
            'next_page_url',
            'path',
            'per_page',
            'prev_page_url',
            'to',
            'total',
        ]);
    }

    public function test_blog_show()
    {
        $response = $this->get('/api/blogs/100000000');

        $response->assertNotFound();
        $response->assertJson();
//        $response->assertJsonStructure([
//            'current_page',
//            'data',
//            'first_page_url',
//            'from',
//            'last_page',
//            'last_page_url',
//            'links',
//            'next_page_url',
//            'path',
//            'per_page',
//            'prev_page_url',
//            'to',
//            'total',
//        ]);
    }
}
