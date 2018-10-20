<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\User;
use App\Models\Tag;
use DB;
use Input;
use View;

class BlogController extends Controller
{
    public function __construct()
    {
           
    }
    /**
     * show index
     * @return [type] [description]
     */
    public function index(){
        /**
         * get post status = 1
         * @var [type]
         */
        $posts = Post::where('status', '=', 1)->orderBy('created_at', 'desc')->paginate(10);    
        
        return view('blog.index',[
            'posts' => $posts,
        ]);
    }

    /**
     * show categories
     * @return [type] [description]
     */
    public function categories(){
        $categories = Category::where('status', '=', 1)->paginate(15);

        // dd($categories);
        return view('blog.categories.index');
    }

    /**
     * show all post
     * @return [type] [description]
     */
    public function posts(){
        $posts = Post::where('status', '=', 1)->paginate(10);    
        
        return view('blog.post.list',[
            'posts' => $posts,
        ]);
    }


    /**
     * Search post
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function showResultSearch(Request $request){

        $tuKhoa =  $request->Input('q');

        if($tuKhoa != ""){
            $posts = Post::SearchByKeyword($tuKhoa)->take(30)->paginate(5);

            $posts->setPath('?q='.$tuKhoa);

            return view('blog.search', [
                'posts' => $posts,
                'tuKhoa' =>$tuKhoa
            ]);
        }else{
            return view('blog.search',[
            'tuKhoa' => $tuKhoa
            ]);
        }
    }
}
