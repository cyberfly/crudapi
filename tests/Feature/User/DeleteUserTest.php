<?php

namespace Tests\Feature\User;

use App\User;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUserTest extends TestCase
{
    /**
     * Test admin can create user
     *
     * @return void
     */
    public function testAdminCanDeleteUser()
    {
        $this->actingAs($this->admin_user);

        $user = factory(User::class)->create();

        $data = [
            'name' => $this->faker->name,
            'email' => $user->email,
            'type' => $user->type,
        ];

        $response = $this->delete(route('admin.users.destroy', $user->id), $data);

        $response->assertSessionHas('success', 'User successfully deleted');
        $response->assertRedirect(route('admin.users.index'));
    }
}
