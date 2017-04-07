<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = [
        'email', 'content', 'reply'
    ];
    public $timestamps = true;
}
