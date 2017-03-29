<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{

    protected $fillable = [
        'user_id', 'article_content', 'live', 'post_on'
    ];

    protected $dates = ['post_on'];

//    protected $guarded = ['id'];

    public function setLiveAttribute($value) {
        $this->attributes['live'] = (boolean)($value);
    }

    public function getShortArticleContentAttribute($value) {
        return substr($this->article_content, 0, random_int(60, 150)) . '...';
    }

    public function setPostOnAttribute($value) {
        $this->attributes['post_on'] = Carbon::parse($value);
    }
}
