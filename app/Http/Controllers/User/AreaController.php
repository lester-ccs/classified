<?php

namespace App\Http\Controllers\User;

use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    public function store(Area $area)
    {
        session()->put('area', $area->slug);

        //redirect to a category index
        return redirect()->back();
    }
}
