<?php

namespace Tests\Feature\User;

use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserTest extends TestCase
{
    /**
     * Test admin can see create user form
     *
     * @return void
     */
    public function testAdminCanSeeUserCreate()
    {
        $this->actingAs($this->admin_user);

        $response = $this->get(route('admin.users.create'));

        $response->assertStatus(200);
    }

    /**
     * Test admin can create user
     *
     * @return void
     */
    public function testAdminCanCreateUser()
    {
        $this->actingAs($this->admin_user);

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'type' => 'u',
            'password' => Str::random(3),
        ];

        $response = $this->post(route('admin.users.store'), $data);

        $response->assertRedirect(route('admin.users.index'));
    }

    /**
     * Test admin create user validation error
     *
     * @return void
     */
    public function testAdminCreateUserValidationError()
    {
        $this->actingAs($this->admin_user);

        $data = [
            'name' => '',
            'email' => 'a',
            'type' => '',
            'password' => 'a',
        ];

        $response = $this->post(route('admin.users.store'), $data);

        $response->assertSessionHasErrors([
            'name' => 'The name field is required.',
            'email' => 'The email must be a valid email address.',
            'type' => 'The type field is required.',
            'password' => 'The password must be at least 3 characters.',
        ]);
    }
}
