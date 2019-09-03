<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['main_title','secondary_title','content','image','author_id'];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
    public $timestamps = false;

}
