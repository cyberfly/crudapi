<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListListingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdminCanSeeListingIndex()
    {
        $this->actingAs($this->admin_user);

        $response = $this->get(route('admin.listings.index'));

        $response->assertStatus(200);
    }
}
