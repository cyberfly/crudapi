<?php

namespace Tests\Feature\Api\Listing;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListListingTest extends TestCase
{
    /**
     * Test logged in api user can see listing
     *
     * @return void
     */
    public function testApiCanSeeUserListing()
    {
        $this->actingAs($this->admin_user, 'api');

        $response = $this->json('GET', route('api.listings.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure(['data', 'status']);
    }
}
