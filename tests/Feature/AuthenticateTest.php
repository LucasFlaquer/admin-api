<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class AuthenticateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $baseUrl = Config::get('app.url') . 'api/auth/login';
        $email = 'lucas.flaquer@gmail.com';
        $password = '1234';
        $response = $this->json('POST', $baseUrl . '/', [
            'email' => $email,
            'password' => $password
        ]);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type', 'expires_in'
            ]);
        // $response = $this->json('POST',);
        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
}
