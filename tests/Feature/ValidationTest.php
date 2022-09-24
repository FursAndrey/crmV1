<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValidationTest extends TestCase
{
    use WithFaker;

    private function callLogin($email, $password)
    {
        return $this->post('login', ['email' => $email, 'password' => $password]);
    }

    public function testWrongEmail()
    {
        $email = $this->faker()->word();
        $password = $this->faker()->password();

        $response = $this->callLogin($email, $password);
        $response->assertStatus(422);

        $content = $response->getContent();
        $this->assertStringContainsString('email', $content);
    }
    
    public function testHasNotPassword()
    {
        $email = $this->faker()->unique()->safeEmail();
        $password = NULL;

        $response = $this->callLogin($email, $password);
        $response->assertStatus(422);

        $content = $response->getContent();
        $this->assertStringContainsString('password', $content);
    }
}
