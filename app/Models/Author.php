<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function books()
    {
        // name of the table should be author_book default naming in laravel
        return $this->belongsToMany('App\Models\Book', 'book_author');
    }
}
