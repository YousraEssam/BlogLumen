<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name','email','Github','twitter','location','latest_article_published'];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
    public $timestamps = false;

}
