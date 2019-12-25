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
     * @param ListingFilter $filter
     * @return ListingCollection
     */
    public function index(ListingFilter $filter)
    {
        $listings = $this->listing->filter($filter)->result();

        return (new ListingCollection($listings))->additional([ 'code' => 200, 'message' => 'Listing successfully retrieved' ]);
    }
}
