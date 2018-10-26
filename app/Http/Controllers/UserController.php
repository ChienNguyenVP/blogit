<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests\StoreBlogUser;

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

            return view('admin.user.profile', compact('user'));
        }else{
            return redirect('admin');
        }
    }

    public function detail($id){
        $user = User::where('id', $id)->first();

        return view('admin.user.profile', compact('user'));
    }
    public function store(StoreBlogUser $request, $id)
    {  
        $data = array();
        $data['full_name'] = $request['name'];
        $data['username'] = $request['username'];
        $data['email'] = $request['email'];
        $data['name'] = $request['name'];
        $data['phone_number'] = $request['phone'];
        $data['avatar'] = $request['thumbnail'];
        User::where('id',$id)->update($data);
        return redirect()->back()->with('success', 'Sửa thông tin thành công');
        
    }
}
