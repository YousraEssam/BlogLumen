<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['main_title','secondary_title','content','image','author_id'];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
    public $timestamps = false;

}
