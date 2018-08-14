<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\AnswerRequest;
use App\Notifications\AnswerQuestionNotification;
use Illuminate\Http\Request;


class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(AnswerRequest $request, $questionId)
    {
        $answer = Answer::updateOrCreate([
            'question_id'=>$questionId,
            'user_id'=>Auth::id()],
            ['content'=>$request->get('content')]);

        //通知
        $answer->question->user->notify(new AnswerQuestionNotification($answer));

        return back();
    }
}
