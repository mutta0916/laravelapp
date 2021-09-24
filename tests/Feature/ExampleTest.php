<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Person;
use Illuminate\Contracts\Auth\Factory;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use App\Listeners\PersonEventListener;
use Illuminate\Events\CallQueuedListener;
use App\Events\PersonEvent;
use App\Jobs\MyJob;
use Mockery;
use App\MyClasses\PowerMyService;

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
        // $list = [];
        // for($i = 0;$i < 10;$i++)
        // {
        //     $p1 = Person::factory()->create();
        //     $p2 = Person::factory()->upper()->create();
        //     $p3 = Person::factory()->lower()->create();
        //     $p4 = Person::factory()->upper()->lower()->create();
        //     $list = array_merge($list, [$p1->id, $p2->id, $p3->id, $p4->id]);
        // }

        // for($i = 0;$i < 10;$i++)
        // {
        //     shuffle($list);
        //     $item = array_shift($list);
        //     $person = Person::find($item);
        //     $data = $person->toArray();
        //     print_r($data);

        //     $this->assertDatabaseHas('people',$data);

        //     $person->delete();
        //     $this->assertDatabaseMissing('people',$data);
        // }

        // 【フェイク機能】ジョブのテスト
        // $id = 1;
        // $data = [
        //     'id' => $id,
        //     'name' => 'DUMMY',
        //     'mail' => 'dummy@mail',
        //     'age' => 0,
        // ];

        // $person = new Person();
        // $person->fill($data)->save();
        // $this->assertDatabaseHas('people', $data);

        // Bus::fake();
        // MyJob::dispatch($id);

        // Bus::assertDispatched(MyJob::class,function($job) use ($id)
        // {
        //     $p = Person::find($id)->first();
        //     return $job->getPersonid() == $p->id;
        // });

        //【フェイク機能】イベントのテスト
        // $person = Person::factory()->create();
        // Event::fake();
        // Event::assertNotDispatched(PersonEvent::class);
        // event(new PersonEvent($person));
        // Event::assertDispatched(PersonEvent::class);
        // Event::assertDispatched(PersonEvent::class, function($event) use ($person)
        // {
        //     return $event->person === $person;
        // });

        // 【フェイク機能】キューのテスト
        // $person = Person::factory()->create();

        // Queue::fake();
        // Queue::assertNothingPushed();

        // MyJob::dispatch($person->id);
        // Queue::assertPushed(MyJob::class);

        // event(PersonEvent::class);
        // Queue::assertPushed(CallQueuedListener::class, 1);
        // Queue::assertPushed(CallQueuedListener::class, function($job)
        // {
        //     return $job->class == PersonEventListener::class;
        // });

        // 【フェイク機能】特定のキューのテスト
        // $person = Person::factory()->create();

        // Queue::fake();
        // Queue::assertNothingPushed();

        // MyJob::dispatch($person->id)->onQueue('myjob');
        // Queue::assertPushed(MyJob::class);
        // Queue::assertPushedOn('myjob', MyJob::class);

        // 【フェイク機能】サービスのテスト
        // $response = $this->get('/hello');
        // $content = $response->getContent();
        // echo $content;
        // $response->assertSeeText('あなたが好きなのは、1番のリンゴですね！', $content);

        // 【フェイク機能】モックを使用する
        $msg = '***OK***';
        $mock = Mockery::mock(PowerMyService::class);
        $mock->shouldReceive('setId')
             ->withArgs([1])
             ->once()
             ->andReturn(null);
        $mock->shouldReceive('say')
             ->once()
             ->andReturn($msg);

        $this->instance(PowerMyService::class, $mock);

        $response = $this->get('/hello');
        $content = $response->getContent();
        $response->assertSeeText($msg, $content);
    }
}
