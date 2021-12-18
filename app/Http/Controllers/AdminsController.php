<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\{
=======
use App\{
>>>>>>> d44f364f34555b6dac108d96c14e4d7fcfdac7e3
    Book,
    Author,
    Publisher,
    Category,
};

class AdminsController extends Controller
{
    public function index()
    {
        $number_of_books = Book::count();
        $number_of_categories = Category::count();
        $number_of_authors = Author::count();
        $number_of_publishers = Publisher::count();

        return view('admin.index', compact('number_of_books', 'number_of_categories', 'number_of_authors', 'number_of_publishers'));
    }
}
