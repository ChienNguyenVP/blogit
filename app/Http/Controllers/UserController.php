<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        return "Chuc nang dang duoc xay dung";
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {

        if(Auth::check()){

            $user = User::where('id', Auth::user()->id)->first();

            return view('user.profile', compact('user'));
        }else{
            return redirect('blog');
        }
    }

    public function detail($id){
        $user = User::where('id', $id)->first();

        dd($user);
        return view('user.detail', compact('user'));
    }
}
