<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Html;
use Yajra\Datatables\Html\Builder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * display json list post
     * @return json ( datatables )
     */
    public function jsonListUser(){
        return Datatables(User::where('status', 1)->get())
        ->addColumn('action', function ($user) {
            return '       
                <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#detail-user-'.$user->id.'"><i class="fa fa-eye" aria-hidden="true"></i></button>
                <a href="users/'.$user->id.'/edit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                <form action="users/'.$user->id.'" method="post" style="display: inline-block;">
                  <input type="hidden" name="_token" value="'.csrf_token().'">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="id" value="'.$user->id.'">
                  <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                </form>
                ';
        })
        ->editColumn('status', '{{ $status == 1 ? "public" : "private" }}' )
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
