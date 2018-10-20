<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Tagged;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tag.index');
    }

    public function datatablesListTag(){
        $tags = Tag::all();

        return Datatables($tags)
            ->addColumn('action', function ($tag) {
                return '       
                    <a href="'.route('admin.categories.show', $tag->id).'" class="btn btn-xs btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="categories/'.$tag->id.'/edit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                    <form action="'.route('admin.tags.destroy', $tag->id).'" method="post" style="display: inline-block;">
                      <input type="hidden" name="_token" value="'.csrf_token().'">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="id" value="'.$tag->id.'">
                      <button type="button" class="btn btn-xs btn-danger delete-category"><i class="glyphicon glyphicon-remove"></i></button>
                    </form>
                    ';
            })
            ->make(true);
    }

    public function datatablesListPost(){

    }

    public function jsonListTagName(){
        $tags = Tag::all();
        // $data = array();

        // foreach ($tags as $tag) {
        //     $data[] = $tag['name'];
        // }


        return response()->json($tags);
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
        $data = $request->except(['_token']);
        $data['slug'] = str_slug($data['name']);

        Tag::create($data);

        return redirect()->back();
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
        $tag = Tag::where('id', $id)->first();
        // dd($tag->slug);
        Tagged::where('tag_slug', $tag->slug)->forceDelete();
        $tag->delete();

        
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

        $tag = Tag::where('id', $id)->first();
        Tagged::where('tag_slug', $tag->slug)->forceDelete();
        $tag->delete();

        return redirect()->back();
    }
}
