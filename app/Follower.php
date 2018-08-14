<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Follower extends Model
{
    protected $fillable = ['user_id','followerable_id','followerable_type'];
}
