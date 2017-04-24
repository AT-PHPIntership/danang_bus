<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    /**
     * Status forward trip
     */
    const STATUS_FORWARD_TRIP = 0;

    /**
     * Status backward trip
     */
    const STATUS_BACKWARD_TRIP= 1;

    


    protected $table = 'directions';
    protected $fillable = [
        'order', 'fee', 'status', 'time', 'route_id', 'stop_id'
    ];
    public $timestamps = true;

    /**
    * Direction has one stop
    *
    * @return Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function stop()
    {
        return $this->belongsTo(Stop::class, 'stop_id');
    }

    /**
     * Direction belongs to a Route
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function routes()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }
    /**
     * Set the status
     *
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->status == self::STATUS_FORWARD_TRIP) {
            return trans('directions.go');
        }
        return trans('directions.comeback');
    }
}
