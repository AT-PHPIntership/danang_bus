<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'title', 'content', 'picture_path', 'category_id', 'user_id'
    ];
    public $timestamps = true;

    /**
     * Get parent that owns News
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get parent that owns news
     *
     * @return Category
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
