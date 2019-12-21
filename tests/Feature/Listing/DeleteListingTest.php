<?php

namespace Tests\Feature\User;

use App\Listing;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteListingTest extends TestCase
{
    /**
     * Test admin can create user
     *
     * @return void
     */
    public function testAdminCanDeleteListing()
    {
        $this->actingAs($this->admin_user);

        $listing = factory(Listing::class)->create([
            'submitter_id' => $this->admin_user->id,
        ]);

        $response = $this->delete(route('admin.listings.destroy', $listing->id));

        $response->assertSessionHas('success', 'Listing successfully deleted');
        $response->assertRedirect(route('admin.listings.index'));
    }
}
