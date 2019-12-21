<?php

namespace Tests\Feature\User;

use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateListingTest extends TestCase
{
    /**
     * Test admin can see create user form
     *
     * @return void
     */
    public function testAdminCanSeeListingCreate()
    {
        $this->actingAs($this->admin_user);

        $response = $this->get(route('admin.listings.create'));

        $response->assertStatus(200);
    }

    /**
     * Test admin can create user
     *
     * @return void
     */
    public function testAdminCanCreateListing()
    {
        $this->actingAs($this->admin_user);

        $data = [
            'list_name' => $this->faker->name,
            'address' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];

        $response = $this->post(route('admin.listings.store'), $data);

        $response->assertRedirect(route('admin.listings.index'));
    }

    /**
     * Test admin create user validation error
     *
     * @return void
     */
    public function testAdminCreateListingValidationError()
    {
        $this->actingAs($this->admin_user);

        $data = [
            'list_name' => '',
            'address' => '',
            'latitude' => 'a',
            'longitude' => 'b',
        ];

        $response = $this->post(route('admin.listings.store'), $data);

        $response->assertSessionHasErrors([
            'list_name' => 'The list name field is required.',
            'address' => 'The address field is required.',
            'latitude' => 'The latitude must be a number.',
            'longitude' => 'The longitude must be a number.',
        ]);
    }
}
