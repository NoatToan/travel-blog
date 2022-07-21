<?php

namespace Tests\Feature\Controllers;

use App\Models\Blog;
use Tests\AbstractControllerTestCase;

class BlogControllerTest extends AbstractControllerTestCase
{
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->model = new Blog();

        parent::__construct($name, $data, $dataName);
    }

    public function test__construct()
    {
        parent::test_paginate();
        parent::test_show();
        parent::test_destroy();
    }
}
