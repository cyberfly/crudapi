<?php

namespace Tests\Feature\Api\Listing;

use App\Listing;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditListingTest extends TestCase
{
    /**
     * Test logged in api user can see listing
     *
     * @return void
     */
    public function testApiCanUpdateListing()
    {
        $this->actingAs($this->admin_user, 'api');

        $listing = factory(Listing::class)->create([
            'submitter_id' => $this->admin_user->id,
        ]);

        $data = [
            'list_name' => $this->faker->name,
        ];

        $response = $this->json('PUT', route('api.listings.update', $listing->id));

        $response->assertStatus(200);
        $response->assertJsonStructure(['data', 'status']);
    }
}
