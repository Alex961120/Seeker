<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\SearchRequest;
use App\Label;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function content(SearchRequest $request)
    {
        $k = $request->get('k');
        $answer = Answer::where('content','like',"%$k%")->with('question')->get();
        dd($answer->toArray());
    }

    public function user(SearchRequest $request)
    {
        $k = $request->get('k');
        $user = User::where('name','like',"%$k%")->get();
        dd($user->toArray());
    }
    public function label(SearchRequest $request)
    {
        $k = $request->get('k');
        $label = Label::where('name','like',"%$k%")->get();
        dd($label->toArray());
    }
}
