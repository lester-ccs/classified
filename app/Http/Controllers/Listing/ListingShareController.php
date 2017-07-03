<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Area;
use App\Listing;
use App\Http\Requests\StoreListingShareFormRequest;
use App\Mail\ListingShared;

class ListingShareController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Area $area, Listing $listing)
    {
        return view('listings.share.index', compact('listing'));
    }

    public function store(StoreListingShareFormRequest $request, Area $area, Listing $listing)
    {
        collect(array_filter($request->emails))->each(function($email) use ($listing, $request) {
            Mail::to($email)->queue(
                new ListingShared($listing, $request->user(), $request->messages)
            );
        });

        return redirect()->route('listings.show', [$area, $listing])->withSuccess('Listing shared successfully.');
    }
}
