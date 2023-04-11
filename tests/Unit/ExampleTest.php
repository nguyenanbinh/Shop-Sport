<?php

namespace Tests\Unit;

use  Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
class ExampleTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test1()
    {
        $this->assertDatabaseHas('users', [
            'email' => '',
            'password'=> ''
        ]);
    }

    public function test2()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'abc@gmail.com',
            'password'=> ''
        ]);
    }

    public function test3()
    {
        $this->assertDatabaseHas('users', [
            'email' => '',
            'password'=> '123'
        ]);
    }

    public function test4()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'brooklyn26297@gmail.com',
            'password'=> '123'
        ]);
    }
    public function test5()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'abc@gmail.com',
            'password'=> '123123123'
        ]);
    }

    public function test6()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'brooklyn26297@gmail.com',
            'password'=> '$2y$10$.UWj/mcx8BGQP4g4fH3fjuXwmVO/8RZWFCAYShB4C/n842B2Z2tLO'
        ]);
    }


}
