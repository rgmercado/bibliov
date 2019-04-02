<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class userCreateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    function it_creates_a_new_user()
    {
        $this->withoutExceptionHandling();

        $this->post('/register/', [
                'mame' =>   'Federico',
                'email' => 'federico@gmai.com',
                'password' => '123456',
                'rol_id' => 'user',
        ])->assertRedirect('login');

        $this->assertCredentials([
            'mame' =>   'Federico',
            'email' => 'federico@gmai.com',
            'password' =>  Hash::make('123456'),
            'rol_id' => 'user',
        ]);

        $this->assertdatabaseHas('role_user',[
            'role_id' => 'user',
            'user_id' +=> '',
        ]);

        $this->assert
    }
}
