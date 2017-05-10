<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    /**
     * Route type Interprovincial
     */
    const TYPE_INTERPROVINCIAL = 1;

    /**
     * Route type inner city
     */
    const TYPE_INNER_CITY = 2;

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
        return $this->hasMany(Direction::class);
    }

    /**
     * Type of route
     *
     * @return string
     */
    public function getTypeLabelAttribute()
    {
        if ($this->type == self::TYPE_INTERPROVINCIAL) {
            return trans('admin_routes.interprovincial_routes');
        }
        return trans('admin_routes.inner_city_routes');
    }
}
