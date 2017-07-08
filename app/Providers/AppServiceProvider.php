<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Area;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        Area::creating(function ($area){
            $prefix = $area->parent ? $area->parent->name . ' ': '';
            $area->slug = str_slug($prefix . $area->name);
        });

        Category::creating(function ($category){
            $category->name = title_case($category->name);
            $prefix = $category->parent ? $category->parent->name . ' ': '';
            $category->slug = str_slug($prefix . $category->name);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
