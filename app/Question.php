<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','description','user_id'];

    public function labels()
    {
        return $this->belongsToMany(Label::class)->withTimestamps();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function follow()
    {
        return $this->morphMany('App\Follower','followerable');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}
