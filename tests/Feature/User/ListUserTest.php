<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminCanSeeUserIndex()
    {
        $this->actingAs($this->admin_user);

        $response = $this->get(route('admin.users.index'));

        $response->assertStatus(200);
    }
}
