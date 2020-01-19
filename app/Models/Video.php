<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
      'name',
      'description',
      'image',
      'youtube',
      'meta_description',
      'meta_keywords',
      'user_id',
      'category_id',
        'published'
    ];

    protected $path = '/images/';

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function skills() {
        return $this->belongsToMany('App\Models\Skill', 'skills_videos');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag', 'tags_videos');
    }

    public function getImageAttribute($image) {
        return $this->path . $image;
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
}
