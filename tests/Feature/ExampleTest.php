<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Person;
use Illuminate\Contracts\Auth\Factory;
use SebastianBergmann\Environment\Console;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

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

        // $data = [
        //     'id' => 1,
        //     'name' => 'taro',
        //     'mail' => 'taro@yamada.jp',
        //     'age' => 12,
        // ];
        // $this->assertDatabaseHas('people',$data);
        // $data['id'] = 2;
        // $this->assertDatabaseMissing('people',$data);

        // シードを使ったテスト
        // $this->seed(DatabaseSeeder::class);
        // $person = Person::find(1);
        // $data = $person->toArray();

        // print_r($data);

        // $this->assertDatabaseHas('people', $data);

        // $person->delete();
        // $this->assertDatabaseMissing('people', $data);

        // ファクトリを使ったテスト
        // for ($i = 0; $i < 100; $i++)
        // {
        //     Person::factory()->create();
        // }

        // $count = Person::get()->count();
        // $person = Person::find(rand(1, $count));
        // $data = $person->toArray();
        // print_r($data);

        // $this->assertDatabaseHas('people', $data);

        // $person->delete();
        // $this->assertDatabaseMissing('people', $data);

        // ステートのテスト
        $list = [];
        for($i = 0;$i < 10;$i++)
        {
            $p1 = Person::factory()->create();
            $p2 = Person::factory()->upper()->create();
            $p3 = Person::factory()->lower()->create();
            $p4 = Person::factory()->upper()->lower()->create();
            $list = array_merge($list, [$p1->id, $p2->id, $p3->id, $p4->id]);
        }

        for($i = 0;$i < 10;$i++)
        {
            shuffle($list);
            $item = array_shift($list);
            $person = Person::find($item);
            $data = $person->toArray();
            print_r($data);

            $this->assertDatabaseHas('people',$data);

            $person->delete();
            $this->assertDatabaseMissing('people',$data);
        }
    }
}
