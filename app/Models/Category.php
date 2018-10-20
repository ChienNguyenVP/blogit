<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable =[
    	'id', 'name', 'slug', 'description', 'thumbnail'
    ];

    public function posts(){
    	return $this->hasMany(Post::class);
    }

}
