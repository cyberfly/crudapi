<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Listing\Api\UpdateListingRequest;
use App\Http\Resources\ListingCollection;
use App\Http\Resources\ListingResource;
use App\Listing;
use Illuminate\Http\Request;

class ListingController extends ApiController
{
    protected $listing;

    public function __construct(Listing $listing)
    {
        $this->listing = $listing;
    }

    /**
     * @param Request $request
     * @return ListingCollection
     */
    public function index(Request $request)
    {
        // TODO: default latitude, longitude for demo purpose, remove it on production

        $current_latitude = $request->get('current_latitude', '3.165850');
        $current_longitude = $request->get('current_longitude', '101.612581');

        $listings = $this->listing->listingsWithDistance($request->all(), $current_latitude, $current_longitude);

        $status = [ 'code' => 200, 'message' => 'Listing successfully retrieved' ];

        return (new ListingCollection($listings))->additional(['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateListingRequest $request
     * @param $id
     * @return ListingResource
     */
    public function update(UpdateListingRequest $request, $id)
    {
        $listing = $this->listing->findOrFail($id);

        $listing->update($request->all());

        $listing->refresh();

        $status = [ 'code' => 200, 'message' => 'Listing successfully updated' ];

        return (new ListingResource($listing))->additional(['status' => $status]);
    }
}
