<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directions extends Model
{
    protected $table = 'directions';
    protected $fillable = [
        'order', 'fee', 'status', 'time', 'route_id', 'stop_id'
    ];
    public $timestamps = true;

    /**
    * Get the phone record associated with the user.
    *
    * @return direction
    */
    public function stop()
    {
        return $this->hasOne('App\Models\Stop');
    }

    /**
     * Get parent that owns direction
     *
     * @return Route
     */
    public function routes()
    {
        return $this->belongsTo('App\Models\Route');
    }
}
