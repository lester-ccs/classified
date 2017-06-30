<?php

namespace App\Http\Controllers\Listing;

use App\Area;
use App\Category;
use App\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\UserViewedListing;

class ListingController extends Controller
{
    public function index(Area $area, Category $category)
    {
        $listings = Listing::with(['user', 'area'])
            ->isLive()
            ->inArea($area)
            ->fromCategory($category)
            ->latestFirst()
            ->paginate(10);

        return view('listings.index', compact('listings', 'category'));
    }

    public function show(Request $request, Area $area, Listing $listing)
    {
        if (!$listing->live()){
            abort(404);
        };

        if ($request->user()) {
            dispatch(new UserViewedListing($request->user(), $listing)); //TODO send this to queue
        }

        return view('listings.show', compact('listing'));
    }
}
