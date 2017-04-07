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
    * Direction has one stop
    *
    * @return Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function stop()
    {
        return $this->hasOne('App\Models\Stop');
    }

    /**
     * Direction belongs to a Route
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function routes()
    {
        return $this->belongsTo('App\Models\Route');
    }
}
