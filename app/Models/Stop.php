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
    
    /**
     * Stop belongs to a direction
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function direction()
    {
        return $this->hasMany(Direction::class);
    }
}
