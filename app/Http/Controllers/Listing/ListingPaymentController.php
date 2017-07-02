<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Area;
use App\Listing;

class ListingPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function show(Area $area, Listing $listing)
    {
        // authorize
        $this->authorize('touch', $listing);

        // check if live
        if ($listing->live()) {
            return back();
        }

        return view('listings.payment.show', compact('listing'));
    }

    public function store(Request $request, Area $area, Listing $listing)
    {
        // authorize
        $this->authorize('touch', $listing);
        // check if live
        if ($listing->live()) {
            return back();
        }

        if ($listing->cost() === 0) {
            return back();
        }

        if (($nonce = $request->payment_method_nonce) === null) {
            return back();
        }

        $result = \Braintree_Transaction::sale([
            'amount' => $listing->cost(),
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success === false) {

            return back()->withError('Something went wrong while procession your payment.');
        }

        $listing->live = true;
        $listing->created_at = \Carbon\Carbon::now();
        $listing->save();

        return redirect()
            ->route('listings.show', [$area, $listing])
            ->withSuccess('Congratulations! Payment accepted and your listing is live.');
    }

    public function update(Request $request, Area $area, Listing $listing)
    {
        $this->authorize('touch', $listing);

        if ($listing->cost() > 0) {
            return back();
        }

        $listing->live = true;
        $listing->created_at = \Carbon\Carbon::now();
        $listing->save();

        return redirect()
            ->route('listings.show', [$area, $listing])
            ->withSuccess('Congratulations! Your listing is live.');
    }
}
