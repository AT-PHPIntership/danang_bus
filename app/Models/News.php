<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $appends = ['picture'];
    protected $table = 'news';
    protected $fillable = [
        'title', 'content', 'picture_path', 'category_id', 'user_id'
    ];
    public $timestamps = true;

    /**
     *  News belongs to an User.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * News belongs to a Category.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * Get the picture path.
     *
     * @return string
     */
    public function getPictureAttribute()
    {
        return asset(config('constant.path_upload_news')).'/'.$this->picture_path;
    }
}
