<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
<<<<<<< HEAD
    public function books()
    {
        // name of the table should be author_book default naming in laravel
        return $this->belongsToMany('App\Models\Book', 'book_author');
=======
    use HasFactory;
    
    public function books()
    {
        // name of the table should be author_book default naming in laravel
        return $this->belongsToMany('App\Book', 'book_author');
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
    }
}
