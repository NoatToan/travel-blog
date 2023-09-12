<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class AbstractControllerTestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $model;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function usesDataProvider(): bool
    {
        return true;
    }

    public function test_paginate()
    {
        $response = $this->get('/api/blogs');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'success',
        ]);
    }

    public function test_show()
    {
        $this->afterApplicationCreated(function () {
            $ids = $this->getIdSamples();
            foreach ($ids as $id) {
                $response = $this->get("/api/blogs/$id");
                $blog = $this->find($id);
                if (!$blog) {
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
                $this->assertEquals($id, $blog->id);
            }
        });
    }

    public function test_destroy()
    {
        $this->afterApplicationCreated(function () {
            $ids = $this->getIdSamples();
            foreach ($ids as $id) {
                /**
                 * @var Model $instanceModel
                 */
                $instanceModel = $this->model->query()->find($id);

                $response = $this->delete(route('blogs.destroy', ['blog' => $id]));

                if (!$instanceModel) {
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

                $this->assertRelationsCountZero($instanceModel);
                $this->assertSoftDeleted($instanceModel);
            }
        });
    }

    public function getIdSamples()
    {
        return [1, 100000, 101];
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {
        if ($this->model) {
            return $this->model->query()->find($id);
        }
        throw new \Exception('Implemented class did not init the model instance');
    }

    public function assertRelationsCountZero($model)
    {
        $relationsCheckingAfterDelete = $this->model->relationsCheckingAfterDelete;
        $model->loadCount($relationsCheckingAfterDelete);
        foreach ($relationsCheckingAfterDelete as $relation) {
            $this->assertEquals(0, $model->{"${relation}_count"});
        }
    }
}
