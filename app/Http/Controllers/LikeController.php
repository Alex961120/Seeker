<?php

namespace App\Http\Controllers;

use App\Like;
use App\Notifications\LikeAnswerNotification;
use Illuminate\Http\Request;
use Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function answer($id)
    {
        $data = ['user_id' => Auth::id(), 'answer_id' => $id];
        if (!Like::where($data)->delete()) {
            $answer = Answer::find($id);
            $answer->user->notify(new LikeAnswerNotification($answer));
            Like::create($data);
        }

        return redirect(url()->previous() . "#answer$id");
    }


}
