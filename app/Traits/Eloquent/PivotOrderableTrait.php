<?php
/**
 * Created by PhpStorm.
 * User: Lester Hurtado
 * Date: 6/29/17
 * Time: 11:22 AM
 */

namespace app\Traits\Eloquent;


/**
 * Trait PivotOrderableTrait
 * @package app\Traits\Eloquent
 */
trait PivotOrderableTrait
{
    /**
     * Order results by newest entities first.
     *
     * @param $query
     * @param $column
     * @param $order
     * @return mixed
     */
    public function scopeOrderByPivot($query, $column = 'created_at', $order = 'desc')
    {
        return $query->orderBy('pivot_' . $column, $order);
    }
}