<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
<<<<<<< HEAD
    public function category()
    {
        // return $this->belongsTo(Category::class);
        return $this->belongsTo('App\Models\Category');
=======
    use HasFactory;

    public function category()
    {
        // return $this->belongsTo(Category::class);
        return $this->belongsTo('App\Category');
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
    }

    public function publisher()
    {
        // return $this->belongsTo(Category::class);
<<<<<<< HEAD
        return $this->belongsTo('App\Models\Publisher');
=======
        return $this->belongsTo('App\Publisher');
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
    }

    public function authors()
    {
<<<<<<< HEAD
        return $this->belongsToMany('App\Models\Author', 'book_author');
=======
        return $this->belongsToMany('App\Author', 'book_author');
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
    }

    public function ratings()
    {
<<<<<<< HEAD
        return $this->hasMany('App\Models\Rating');
=======
        return $this->hasMany('App\Rating');
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
    }

    public function rate()
    {
        return $this->ratings->isNotEmpty() ? $this->ratings()->sum('value') / $this->ratings()->count() : 0;
    }
}
