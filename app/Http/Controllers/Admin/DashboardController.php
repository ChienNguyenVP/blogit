<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use View;
use App\User;
use App\Models\Post;
use App\Models\Category;


class DashboardController extends Controller
{

	public function __construct(){
		View::share('categories', Category::where('status', 1)->get());
	}

	/**
	 * admin dashboard
	 * @return [type] [description]
	 */
    public function dashboard(){
    	$countRecycleBinPost = Post::where('status', 1)->count();
    	$coutUserRegister = User::count();

    	return view('admin.index', [
    		'recycleBinPost' => $countRecycleBinPost,
    		'userRegister'	=> $coutUserRegister
    	]);
    }
}
