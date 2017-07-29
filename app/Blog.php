<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $table = 'blog';
    public $fillable = ['title','description', 'link', 'category', 'comments', 'pubDate'];
}
