<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function books()
    {
        // return $this->hasMany(Book::class);
        return $this->hasMany('App\Models\Book');
    }
}
