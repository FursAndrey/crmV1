<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    // use RefreshDatabase, WithFaker;
    use DatabaseTransactions, WithFaker;

    private $password;
    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->password = $this->faker()->password();
        $this->user = User::factory()->create(['password' => bcrypt($this->password)]);
    }

    private function callLogin($password)
    {
        return $this->post('login', ['email' => $this->user->email, 'password' => $password]);
    }

    public function testAuthSuccess()
    {
        $response = $this->callLogin($this->password);
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
        $response = $this->callLogin($this->password.'7');
        $response->assertStatus(301);

        $response = $this->get('allRoles');
        $response->assertStatus(301);
    }

    public function testAuthForRoles()
    {
        $response = $this->callLogin($this->password.'7');
        $response->assertStatus(301);

        $response = $this->get('allRoles');
        $response->assertStatus(301);

        $response = $this->post('createRole');
        $response->assertStatus(301);
    }
}
