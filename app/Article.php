<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//    protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = [];

    // If you use slug instead of id to find article.
//    public function getRouteKeyName()
//    {
//        return 'slug'; // Article::where('slug', $article)->first();
//    }

    public function path()
    {
        return route('articles.show', $this);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
