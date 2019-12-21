<?php

namespace Tests\Feature\User;

use App\Listing;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditListingTest extends TestCase
{
    /**
     * Test admin can see create user form
     *
     * @return void
     */
    public function testAdminCanSeeListingEdit()
    {
        $this->actingAs($this->admin_user);

        $listing = factory(Listing::class)->create([
            'submitter_id' => $this->admin_user->id,
        ]);

        $response = $this->get(route('admin.listings.edit', $listing));

        $response->assertStatus(200);
    }

    /**
     * Test admin can create user
     *
     * @return void
     */
    public function testAdminCanEditListing()
    {
        $this->actingAs($this->admin_user);

        $listing = factory(Listing::class)->create([
            'submitter_id' => $this->admin_user->id,
        ]);

        $data = [
            'list_name' => $this->faker->name,
            'address' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];

        $response = $this->put(route('admin.listings.update', $listing->id), $data);

        $response->assertSessionHas('success', 'Listing updated successfully');
    }
}
