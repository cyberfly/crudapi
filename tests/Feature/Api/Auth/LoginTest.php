<?php

namespace Tests\Feature\Api\Auth;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * Test admin can create user
     *
     * @return void
     */
    public function testApiUserCanLogin()
    {
        $email = $this->faker->unique()->safeEmail;
        $password_string = Str::random(10);
        $password = Hash::make($password_string);

        $user = factory(User::class)->create([
            'email' => $email,
            'password' => $password
        ]);

        $data = [
            'email' => $email,
            'password' => $password_string,
        ];

        $response = $this->json('POST', route('api.auth.login'), $data);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data', 'token']);
    }
}
