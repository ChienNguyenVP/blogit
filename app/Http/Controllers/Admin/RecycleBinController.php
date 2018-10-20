<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tagged;
use App\Models\Tag;

class RecycleBinController extends Controller
{
	/**
	 * recycle bin posts
	 * @return [type] [description]
	 */
    public function posts(){
    	return view('admin.post.recycleBin');
    }

    public function undoPost(Request $request){
      $tagged = Tagged::onlyTrashed()
                ->where('taggable_id','=' ,$request->input('id'), 'and', 'taggable_type', '=', Post::class)
                ->with('tag');
      

      foreach ($tagged->get() as $tag) {
        Tag::onlyTrashed()
          ->where('slug', $tag->tag_slug)
          ->restore();
      }
      $tagged->restore();
      

    	$post = Post::where('id', $request->input('id'))->with('tagged')->restore();


      // dd($tags->tag());

      // if($post){
      //   Tag::onlyTrashed()
      //       ->where();
      // }

    	return redirect()->back();
    }

    public function deleteForeverPost(Request $request){
      Tagged::onlyTrashed()
                ->where('taggable_id','=' ,$request->input('id'), 'and', 'taggable_type', '=', Post::class)
                ->forceDelete();
    	Post::where('id', $request->input('id'))->forceDelete();
    	
    	return redirect()->back();
    }

    public function datatablesListPost(){
    	$posts = Post::onlyTrashed()->get();

      return Datatables($posts)
        ->addColumn('action', function ($post) {
          return '
            <form action="'.route('admin.recycleBin.posts.undoPost').'" method="post" style="display: inline-block;">
              <input type="hidden" name="_token" value="'.csrf_token().'">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="id" value="'.$post->id.'">
              <button type="submit" title="Click để khôi phục!" class="btn btn-xs btn-success">
                <i class="fa fa-undo" aria-hidden="true"></i>
              </button>
            </form>
            <form action="'.route('admin.recycleBin.posts.delete').'" method="post" style="display: inline-block;">
              <input type="hidden" name="_token" value="'.csrf_token().'">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="id" value="'.$post->id.'">
              <button type="button" class="btn btn-xs btn-danger delete-post" title="Click để xóa vĩnh viễn!">
                <i class="glyphicon glyphicon-remove"></i>
              </button>
            </form>
            ';
        })
        ->editColumn('is_featured', '{{ $is_featured == 1 ? "featured" : "" }}' )
        ->editColumn('status', '{{ $status == 1 ? "public" : "private" }}' )
        ->make(true);
    }

    /**
     * recyclebin categories *****************************************
     */
    
    public function categories(){
      return view('admin.category.recycleBin');
    }

    public function undoCategory(Request $request){

      Category::where('id', $request->input('id'))->restore();

      return redirect()->back();
    }

    public function deleteForeverCategory(Request $request){
      Category::where('id', $request->input('id'))->forceDelete();
      
      return redirect()->back();
    }

    public function datatablesListCategory(){
      $categories = Category::onlyTrashed()->get();

      return Datatables($categories)
        ->addColumn('action', function ($category) {
          return '
            <form action="'.route('admin.recycleBin.categories.undoCategory').'" method="post" style="display: inline-block;">
              <input type="hidden" name="_token" value="'.csrf_token().'">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="id" value="'.$category->id.'">
              <button type="submit" title="Click để khôi phục!" class="btn btn-xs btn-success">
                <i class="fa fa-undo" aria-hidden="true"></i>
              </button>
            </form>
            <form action="'.route('admin.recycleBin.categories.delete').'" method="post" style="display: inline-block;">
              <input type="hidden" name="_token" value="'.csrf_token().'">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="id" value="'.$category->id.'">
              <button type="button" class="btn btn-xs btn-danger delete-post" title="Click để xóa vĩnh viễn!">
                <i class="glyphicon glyphicon-remove"></i>
              </button>
            </form>
            ';
        })
        ->make(true);
    }

    /**
     * recyclebin tags *****************************************
     */
    
    public function tags(){
      return view('admin.tag.recycleBin');
    }

    public function datatablesListTag(){
      $tags = Tag::onlyTrashed()->get();

      return Datatables($tags)
        ->addColumn('action', function ($tag) {
          return '
            <form action="'.route('admin.recycleBin.tags.undoTag').'" method="post" style="display: inline-block;">
              <input type="hidden" name="_token" value="'.csrf_token().'">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="id" value="'.$tag->id.'">
              <button type="submit" title="Click để khôi phục!" class="btn btn-xs btn-success">
                <i class="fa fa-undo" aria-hidden="true"></i>
              </button>
            </form>
            <form action="'.route('admin.recycleBin.tags.delete').'" method="post" style="display: inline-block;">
              <input type="hidden" name="_token" value="'.csrf_token().'">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="id" value="'.$tag->id.'">
              <button type="button" class="btn btn-xs btn-danger delete-post" title="Click để xóa vĩnh viễn!">
                <i class="glyphicon glyphicon-remove"></i>
              </button>
            </form>
            ';
        })
        ->make(true);
    }
    public function undoTag(Request $request){

      Tag::where('id', $request->input('id'))->restore();

      return redirect()->back();
    }

    public function deleteForeverTag(Request $request){
      Tag::where('id', $request->input('id'))->forceDelete();
      
      return redirect()->back();
    }
}
