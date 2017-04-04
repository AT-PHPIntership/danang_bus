<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = 'name';
    public $timestamps = true;


    public function news() {
    	return $this->hasMany('App\News');
    }
}
