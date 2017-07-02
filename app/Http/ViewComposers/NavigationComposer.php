<?php
/**
 * Created by PhpStorm.
 * User: Lester Hurtado
 * Date: 7/2/17
 * Time: 7:08 PM
 */
namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Area;

class NavigationComposer
{
    private $area;

    public function compose(View $view)
    {
        if (!Auth::check()) {
            return $view;
        }

        $user = Auth::user();
        $listings = $user->listings;

        return $view->with([
           'unpublishedListingsCount' => $listings->where('live', false)->count(),
            'publishedListingsCount' => $listings->where('live', true)->count(),
        ]);
    }
}