<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
    }

    public function show($id)
    {
        $label = Label::where('id',$id)->first();
        return view('label.show',compact('label'));
    }

}
