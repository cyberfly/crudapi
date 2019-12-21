<?php

namespace Tests\Feature\User;

use App\User;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditUserTest extends TestCase
{
    /**
     * Test admin can see create user form
     *
     * @return void
     */
    public function testAdminCanSeeUserEdit()
    {
        $this->actingAs($this->admin_user);

        $user = factory(User::class)->create();

        $response = $this->get(route('admin.users.edit', $user));

        $response->assertStatus(200);
    }

    /**
     * Test admin can create user
     *
     * @return void
     */
    public function testAdminCanEditUser()
    {
        $this->actingAs($this->admin_user);

        $user = factory(User::class)->create();

        $data = [
            'name' => $this->faker->name,
            'email' => $user->email,
            'type' => $user->type,
        ];

        $response = $this->put(route('admin.users.update', $user->id), $data);

        $response->assertSessionHas('success', 'User updated successfully');
    }
}
