<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValidationTest extends TestCase
{
    public function testWrongEmail()
    {
        $this->seed();
        
        $email = 'test_email';
        $password = $email;

        $response = $this->post('login', ['email' => $email, 'password' => $password]);
        $response->assertStatus(422);

        $content = $response->getContent();
        $this->assertStringContainsString('email', $content);
    }
    
    public function testHasNotPassword()
    {
        $this->seed();
        
        $email = 'test_email@mail.ru';

        $response = $this->post('login', ['email' => $email]);
        $response->assertStatus(422);

        $content = $response->getContent();
        $this->assertStringContainsString('password', $content);
    }
}
