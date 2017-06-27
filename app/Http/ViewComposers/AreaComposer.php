<?php
/**
 * Created by PhpStorm.
 * User: Lester Hurtado
 * Date: 6/27/17
 * Time: 9:05 AM
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Area;

class AreaComposer
{
    private $area;

    public function compose(View $view)
    {
        if (!$this->area) {
            $this->area = Area::where('slug', session()->get('area', config()->get('classified.defaults.area')))->first();
        }


        return $view->with('area', $this->area);
    }
}