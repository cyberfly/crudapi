<?php

namespace App\Http\Controllers\Api;

use App\Filters\ListingFilter;
use App\Http\Resources\ListingCollection;
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
}
