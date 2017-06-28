<?php

namespace App\Http\Controllers\Category;

use App\Area;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Area $area)
    {
        // eager load in listings later

        $categories = Category::withListingsInArea($area)->get()->toTree();

        return view('categories.index', compact('categories'));

    }
}
