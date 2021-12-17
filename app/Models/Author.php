<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    
    public function books()
    {
        // name of the table should be author_book default naming in laravel
        return $this->belongsToMany('App\Book', 'book_author');
    }
}
