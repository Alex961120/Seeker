<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id=null)
    {
        $id = $id ?? $id = Auth::id();
        $user = User::findOrFail($id);

        return view('user.show',compact('user'));
    }

    public function avatar(Request $request)
    {
        if($filename = $request->get('filename')) {

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            return back();
        }
        $file = $request->file('avatar');
        $filename = md4(time().Auth::id()).'.'.$file->getClientOriginalExtension();
        $torage::disk('image')->put('avatar/'.$filename,file_get_contents($file));

        return json_encode($filename);
    }
}
