<?php

namespace App\Http\Controllers;

use App\Label;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Auth;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user($id)
    {
        $user = User::find($id);
        $data = ['user_id'=>Auth::id()];
        if (!$user->follow()->where($data)->delete()){
            $user->follow()->create($data);
            $user->notify(new FollowUserNotification());
        }

        return back();
    }

    public function question($id)
    {
        $follower = Question::find($id);
        $data = ['user_id'=>Auth::id()];
        if (!$follower->follow()->where($data)->delete()){
            $follower->follow()->create($data);
        }
        return back();
    }

    public function label($id)
    {
        $follower = Label::find($id);
        $data = ['user_id'=>Auth::id()];
        if (!$follower->follow()->where($data)->delete()){
            $follower->follow()->create($data);
        }
        return back();
    }
}
