<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use \Conner\Tagging\Taggable;

    protected $dates = ['deleted_at'];


    protected $fillable = [
    	'title', 'thumbnail', 'description', 'content', 'user_id', 'category_id', 'slug', 'status'
    ];

    public function author(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function category(){
      return $this->belongsTo('App\Models\Category', 'category_id');
    }

   	public static function add($data){
   		$post = Post::create($data);
   	}

   	public static function destroy($id){
   		Post::where('id', $id)->update([
   			'status' => 0,
   		]);
   	}

    /**
     * search psot
     * @param  [type] $query   
     * @param  [type] $keyword 
     */
    public static function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("title", "LIKE","%$keyword%")
                    ->orWhere("description", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
