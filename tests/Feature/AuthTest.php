<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function testAuthSuccess()
    {
        $this->seed();

        $password = '123456';
        $user = User::factory()->create(['password' => bcrypt($password)]);
        
        $response = $this->post('login', ['email' => $user->email, 'password' => $password]);
        $response->assertStatus(200);

        $response = $this->get('allRoles');
        $response->assertStatus(200);
        
        $response = $this->get('logout');
        $response->assertStatus(200);
        
        $response = $this->get('allRoles');
        $response->assertStatus(301);
    }
    
    public function testAuthFail()
    {
        $this->seed();

        $password = '123456';
        $user = User::factory()->create(['password' => bcrypt($password)]);
        
        $response = $this->post('login', ['email' => $user->email, 'password' => $password.'7']);
        $response->assertStatus(301);

        $response = $this->get('allRoles');
        $response->assertStatus(301);
    }

    public function testAuthForRoles()
    {
        $this->seed();

        $password = '123456';
        $user = User::factory()->create(['password' => bcrypt($password)]);
        
        $response = $this->post('login', ['email' => $user->email, 'password' => $password.'7']);
        $response->assertStatus(301);

        $response = $this->get('allRoles');
        $response->assertStatus(301);

        $response = $this->post('createRole');
        $response->assertStatus(301);
    }
}
