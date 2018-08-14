<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = ['name'];

    protected function upsert($labels)
    {
        $ids=[];
        foreach(explode(' ',$labels) as $label)
        {
            $ids[] = $this->firstOrCreate(['name'=>$label])->id;
        }
        return $ids;
    }

    public function questions()
    {
        return $this->belongsTo(Question::class)->withTimestamps();
    }

    public function follow()
    {
        return $this->morphMany('App\Follower','followerable');
    }
}
