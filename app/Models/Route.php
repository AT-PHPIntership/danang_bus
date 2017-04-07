<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
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
        return $this->hasMany('App\Models\Direction');
    }
}
