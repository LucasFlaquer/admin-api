<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class AuthenticateTest extends TestCase
{
    /**
     * @var User()
     */
    private $user;

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $user = new User();
        $user->name = 'lucas';
        $user->email = 'lucas.flaquer@gmail.com';
        $user->password = bcrypt('123');
        $user->save();
        $this->user = $user;
    }


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
        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type', 'expires_in'
            ]);
        // $response = $this->json('POST',);
        // $response = $this->get('/');

        $response->assertStatus(200);
    }
}
