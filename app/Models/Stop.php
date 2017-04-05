<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    protected $table = 'stops';
    protected $fillable = [
    	'name', 'lat', 'lng' ,'address'
    ];
    public $timestamps = true;

    public function direction() {
    	return $this->belongsTo('App\Models\Directions');
    }
}
