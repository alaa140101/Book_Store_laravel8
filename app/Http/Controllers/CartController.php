<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $request)
    {
        $book = Book::find($request->id);

        if(auth()->user()->booksInCart->contains($book)){
            $newQuantity = $request->quantity + auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies;
            if ($newQuantity > $book->number_of_copies) {
                session()->flash('warning_message', 'الكمية المطلوبة غير ممكنة، الكمية المتوفرة هي: '. (auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies). 'كتاب');
                return redirect()->back();
            }else{
                auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies' => $newQuantity]);
            }
        }else {
            auth()->user()->booksInCart()->attach($request->id, ['number_of_copies' => $request->quantity]);
        }

        return redirect()->back();
    }

    public function viewCart()
    {
        $items = auth()->user()->booksInCart;
        return view('cart', compact('items'));
    }

    public function removeOne(Book $book) {
        $oldQuantity = auth()->user()->booksIncart()->where('book_id', $book->id)->first()->pivot->number_of_copies;

        if ($oldQuantity > 1) {
            auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies' => --$oldQuantity]);
        } else {
            auth()->user()->bookInCart()->detach($book->id);
        }

        return redirect()->back();
    }

    public function removeAll(Book $book) {
        auth()->user()->booksInCart()->detach($book->id);

        return redirect()->back();
    }
}
