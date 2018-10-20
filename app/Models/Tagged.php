<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Conner\Tagging\Model\Tagged as TaggingTagged;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tagged extends TaggingTagged
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
