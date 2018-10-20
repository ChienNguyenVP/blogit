<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Conner\Tagging\Model\Tag as TaggingTag;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends TaggingTag
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
