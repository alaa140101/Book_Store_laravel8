<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('/admin')->middleware('can:update-books')->group(function() {
    Route::get('/', 'App\Http\controllers\AdminsController@index')->name('admin.index');
    Route::resource('/books', 'App\Http\controllers\BooksController');
    Route::resource('/categories', 'App\Http\controllers\CategoriesController');
    Route::resource('/publishers', 'App\Http\controllers\PublishersController');
    Route::resource('/authors', 'App\Http\controllers\AuthorsController');
    Route::resource('/users', 'App\Http\controllers\UsersController')->middleware('can:update-users');
});

Route::get('/home', 'App\Http\controllers\HomeController@index')->name('home');

Route::get('/', 'App\Http\controllers\GalleryController@index')->name('gallery.index');

Route::get('/search', 'App\Http\controllers\GalleryController@search')->name('search');

Route::get('/book/{book}', 'App\Http\controllers\BooksController@details')->name('book.details');
Route::post('/book/{book}/rate', 'App\Http\controllers\BooksController@rate')->name('book.rate');

Route::get('/categories', 'App\Http\controllers\CategoriesController@list')->name('gallery.categories.index');
Route::get('/categories/search', 'App\Http\controllers\CategoriesController@search')->name('gallery.categories.search');
Route::get('/categories/{category}', 'App\Http\controllers\CategoriesController@result')->name('gallery.categories.show');

Route::get('/publishers', 'App\Http\controllers\PublishersController@list')->name('gallery.publishers.index');
Route::get('/publishers/search', 'App\Http\controllers\PublishersController@search')->name('gallery.publishers.search');
Route::get('/publishers/{publisher}', 'App\Http\controllers\PublishersController@result')->name('gallery.publishers.show');

Route::get('/authors', 'App\Http\controllers\AuthorsController@list')->name('gallery.authors.index');
Route::get('/authors/search', 'App\Http\controllers\AuthorsController@search')->name('gallery.authors.search');
Route::get('/authors/{author}', 'App\Http\controllers\AuthorsController@result')->name('gallery.authors.show');

Route::get('/authors/{author}', 'App\Http\controllers\AuthorsController@result')->name('gallery.authors.show');

Route::post('/cart', 'App\Http\controllers\CartController@addToCart')->name('cart.add');
Route::get('/cart', 'App\Http\controllers\CartController@viewCart')->name('cart.view');
Route::post('/removeOne/{book}', 'App\Http\controllers\CartController@removeOne')->name('cart.remove_one');
Route::post('/removeAll/{book}', 'App\Http\controllers\CartController@removeAll')->name('cart.remove_all');