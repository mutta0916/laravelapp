<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Person;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HelloTest extends TestCase
{
    //use DatabaseMigrations;

    public function testHello()
    {
        // User::factory()->create([
        //     'name' => 'AAA',
        //     'email' => 'BBB@CCC.COM',
        //     'password' => 'ABCABC',
        // ]);
        // User::factory()->count(10)->create();

        // $this->assertDatabaseHas('users',[
        //     'name' => 'AAA',
        //     'email' => 'BBB@CCC.COM',
        //     'password' => 'ABCABC',
        // ]);

        // Person::factory()->create([
        //     'name' => 'XXX',
        //     'mail' => 'YYY@ZZZ.COM',
        //     'age' => '123',
        // ]);
        // Person::factory()->count(10)->create();

        // $this->assertDatabaseHas('people',[
        //     'name' => 'XXX',
        //     'mail' => 'YYY@ZZZ.COM',
        //     'age' => '123',
        // ]);
    }
}
