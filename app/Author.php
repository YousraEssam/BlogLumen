<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','email','Github','twitter','location','latest_article_published'];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
    public $timestamps = false;

}
