<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;

class GalleryController extends Controller
{
    public function index()
    {
        $books = Book::Paginate(12);
        $title = 'عرض الكتب حسب تاريخ الإضافة';

        return view('gallery', compact('books', 'title'));
    }

    public function search(Request $request)
    {
        /* 
        $books = Book::with('authors:name as author')
            ->where('title', 'like', "%{$request->term}%")
            ->orwhere('author', 'like', "%{$request->term}%")
            ->paginate(3); 
            */
        $books = Book::whereHas('authors', function($query) use( $request) {
                $query->where('name', 'like', '%'.$request->term.'%');
            })->orWhere('title','LIKE','%'.$request->term.'%')->paginate(3);          

        $title = 'عرض نتائج البحث عن :'. $request->term;

        return view('gallery', compact('books', 'title'));
    }
}
