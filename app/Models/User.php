<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin()
    {
        return $this->adminstration_level > 0 ? true : false;
    }

    public function isSuperAdmin()
    {
        return $this->adminstration_level > 1 ? true : false;
    }

    public function ratings()
    {
<<<<<<< HEAD
        return $this->hasMany('App\Models\Rating');
=======
        return $this->hasMany('App\Rating');
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
    }

    public function rated(Book $book)
    {
        return $this->ratings->where('book_id', $book->id)->isNotEmpty();
    }

    public function bookRating(Book $book)
    {
        return $this->rated($book) ? $this->ratings->where('book_id', $book->id)->first() : NULL;
    }

    public function booksInCart()
    {
<<<<<<< HEAD
        return $this->belongsToMany('App\Models\Book')->withPivot(['number_of_copies', 'bought'])->wherePivot('bought', False);
=======
        return $this->belongsToMany('App\Book')->withPivot(['number_of_copies', 'bought'])->wherePivot('bought', False);
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
    }

    public function reatedpurches()
    {
<<<<<<< HEAD
        return $this->belongsToMany('App\Models\Book')->withPivot(['bought'])->wherePivot('bought', true);
=======
        return $this->belongsToMany('App\Book')->withPivot(['bought'])->wherePivot('bought', true);
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
    }
}
