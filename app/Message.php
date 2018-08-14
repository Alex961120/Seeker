<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['from_user_id', 'to_user_id', 'content'];

    //发送私信的用户
    public function fromUser()
    {
        return $this->belongsTo('App\User', 'from_user_id');
    }

    //接受私信的用户
    public function toUser()
    {
        return $this->belongsTo('App\User', 'to_user_id');
    }

}
