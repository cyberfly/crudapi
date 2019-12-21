<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Listing\StoreListingRequest;
use App\Http\Requests\Listing\UpdateListingRequest;
use App\Listing;
use Illuminate\Http\Request;

class ListingController extends AdminController
{
    protected $listing;

    public function __construct(Listing $listing)
    {
        $this->listing = $listing;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = $this->listing->latest()->paginate(50);

        return view('admin.listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreListingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListingRequest $request)
    {
        $listing = auth()->user()->listings()->create($request->all());

        $request->session()->flash('success', 'Listing created successfully');

        return redirect()->route('admin.listings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = $this->listing->findOrFail($id);

        return view('admin.listings.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateListingRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListingRequest $request, $id)
    {
        $listing = $this->listing->findOrFail($id);

        $listing->update($request->all());

        $listing->refresh();

        $request->session()->flash('success', 'Listing updated successfully');

        return redirect()->route('admin.listings.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $listing = $this->listing->findOrFail($id);

        $listing->delete();

        $request->session()->flash('success', 'Listing successfully deleted');

        return redirect()->route('admin.listings.index');
    }
}
