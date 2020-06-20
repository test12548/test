<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $guarded = [];

    public function Book()
    {
        return $this->hasMany('App\Book');
    }

}
