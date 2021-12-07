<?php

namespace Modules\Article\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleAPITest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_getALL()
    {
        $this->withoutExceptionHandling();
        $this->json('GET','/api/getALLarticles')
        ->assertStatus(200);
    }

    public function test_getById()
    {
        $this->withoutExceptionHandling();

        $this->get('/api/articleByID/3')
        ->assertStatus(200);
    }

    public function test_add_article()
    {

        $this->withoutExceptionHandling();

        $this->post('/api/addArticle?title=test&created_by=testdemo&description=test')
        ->assertStatus(200);
        // ->assertStatus(200);

    }

    public function test_update_article()
    {
        $this->withoutExceptionHandling();

        $this->put('/api/updateArticle/5?title=test&created_by=testdemo&description=test')
        ->assertStatus(200);
        // ->assertStatus(200);
    }


    public function test_delete_article()
    {
        $this->withoutExceptionHandling();

        $this->delete('/api/deleteArticle/6')
        ->assertStatus(200);
        // ->assertStatus(200);
    }
}