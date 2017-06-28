<?php
/**
 * Created by PhpStorm.
 * User: Lester Hurtado
 * Date: 6/28/17
 * Time: 9:18 AM
 */

namespace app\Traits\Eloquent;

trait OrderableTrait
{
    /**
     * Order results by newest entities first.
     *
     * @param $query
     * @return mixed
     */
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}