<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        // $response = $this->get('/');

        // $response->assertStatus(200);
        // $this->get('/hello')->assertOk();
        // $this->post('/hello')->assertOk();
        // $this->get('/hello/1')->assertOk();
        // $this->get('/hoge')->assertStatus(404);
        // $this->get('/hello')->assertSeeText('Index');
        // $this->get('/hello')->assertSee('<h1>', $escaped = false);
        // $this->get('/hello')->assertSeeInOrder(['<html','<head','<body','<h1>'], $escaped = false);
        // $this->get('/hello/json/3')->assertSeeText('PAINOMI');
        // $this->get('/hello/json/3')->assertExactJson([ 'age'=>'10','created_at'=>null,'id'=>3,'mail'=>'painomi@mail.com','name'=>'PAINOMI','updated_at'=>null]);

        $data = [
            'id' => 1,
            'name' => 'taro',
            'mail' => 'taro@yamada.jp',
            'age' => 12,
        ];
        $this->assertDatabaseHas('people',$data);
        $data['id'] = 2;
        $this->assertDatabaseMissing('people',$data);
    }
}
