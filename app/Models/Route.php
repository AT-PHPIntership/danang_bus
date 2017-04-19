<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    /**
     * Route type Inter minication
     */
    const ROUTE_TYPE_INTER_MUNICIPAL = 1;

    /**
     * Route type Urban
     */
    const ROUTE_TYPE_INNER = 2;

    protected $table = 'routes';
    protected $fillable = [
        'name', 'distance', 'frequency', 'frequency_peak', 'type', 'start_time', 'end_time'
    ];
    public $timestamps = true;

    /**
     * Route has many directions
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function directions()
    {
        return $this->hasMany(Directions::class);
    }

    /**
     * Type of route
     *
     * @return string
     */
    public function getTypeLabelAttribute()
    {
        if ($this->type == self::ROUTE_TYPE_INTER_MUNICIPAL) {
            return trans('admin_routes.inter_municipal');
        }
        return trans('admin_routes.urban');
    }
}
